<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\PersonenModel;
use App\Models\BoardsModel;

class Tasks extends BaseController
{
    public function index()
    {
        $taskModel   = new TaskModel();
        $boardsModel = new BoardsModel();

        // Alle Boards für Dropdown holen
        $boards = $boardsModel->getAllBoards();

        // Aktives Board bestimmen (?board=ID), sonst erstes Board
        $boardId = (int) ($this->request->getGet('board') ?? 0);
        if ($boardId === 0 && !empty($boards)) {
            $boardId = (int) $boards[0]['id'];
        }

        $data = [
            'boards' => $boards,
            'activeBoardId' => $boardId,

            // Taskboard-Daten: Spalten + Tasks pro Spalte
            'spalten' => $taskModel->getTaskboardData($boardId),
        ];

        return view('startseite')
            . view('menu')
            . view('pages/tasks', $data)
            . view('footer');
    }

    public function new()
    {
        // spaltenid aus URL holen, z.B. /tasks/new?spaltenid=5
        $spaltenId = (int) ($this->request->getGet('spaltenid') ?? 0);

        $data = [
            'mode'   => 'create',
            'action' => '/public/tasks/create',
            'task'   => [
                'personenid'       => '',
                'taskartenid'      => '',
                'spaltenid'        => $spaltenId > 0 ? $spaltenId : '',
                'sortid'           => '',
                'tasks'            => '',
                'erinnerungsdatum' => '',
                'erinnerung'       => 0,
                'notizen'          => '',
            ],
            'error' => [],
        ];

        return view('startseite')
            . view('menu')
            . view('pages/task_form', $data)
            . view('footer');
    }


    public function create()
    {
        $post = $this->request->getPost();

        if (!$this->validation->run($post, 'tasks')) {

            $data = [
                'mode'  => 'create',
                'task'  => $post,
                'error' => $this->validation->getErrors(),
            ];

            return view('startseite')
                . view('menu')
                . view('pages/task_form', $data)
                . view('footer');
        }

        $personenId = (int) $post['personenid'];
        $personenModel = new PersonenModel();

        if (!$personenModel->find($personenId)) {
            $data = [
                'mode'  => 'create',
                'task'  => $post,
                'error' => ['personenid' => 'Personen-ID existiert nicht. Bitte gültige ID aus der Personen-Tabelle eingeben.'],
            ];

            return view('startseite')
                . view('menu')
                . view('pages/task_form', $data)
                . view('footer');
        }

        $taskModel = new TaskModel();

        $dataInsert = [
            'tasks'            => (string) $post['tasks'],
            'taskartenid'      => (int) $post['taskartenid'],
            'personenid'       => $personenId,
            'spaltenid'        => (int) $post['spaltenid'],
            'sortid'           => ($post['sortid'] ?? '') === '' ? null : (int) $post['sortid'],
            'erinnerungsdatum' => ($post['erinnerungsdatum'] ?? '') === '' ? null : (string) $post['erinnerungsdatum'],
            'erinnerung'       => isset($post['erinnerung']) ? 1 : 0,
            'notizen'          => (string) ($post['notizen'] ?? ''),
            'erledigt'         => 0,
            'geloescht'        => 0,
            'erstelldatum'     => date('Y-m-d'),
        ];

        $taskModel->insert($dataInsert);

        return redirect()->to('/tasks');
    }

    public function edit(int $id)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->find($id);

        if (!$task) {
            return redirect()->to('/tasks');
        }

        $data = [
            'mode'   => 'update',
            'action' => "/public/tasks/update/$id",
            'task'   => $task,
            'error'  => [],
        ];

        return view('startseite')
            . view('menu')
            . view('pages/task_form', $data)
            . view('footer');
    }

    public function update(int $id)
    {
        $post = $this->request->getPost();

        if (!$this->validation->run($post, 'tasks')) {

            $data = [
                'mode'   => 'update',
                'action' => "/public/tasks/update/$id",
                'task'   => array_merge(['id' => $id], $post),
                'error'  => $this->validation->getErrors(),
            ];

            return view('startseite')
                . view('menu')
                . view('pages/task_form', $data)
                . view('footer');
        }

        $personenId = (int) $post['personenid'];
        $personenModel = new PersonenModel();

        if (!$personenModel->find($personenId)) {
            $data = [
                'mode'   => 'update',
                'action' => "/public/tasks/update/$id",
                'task'   => array_merge(['id' => $id], $post),
                'error'  => ['personenid' => 'Personen-ID existiert nicht. Bitte gültige ID aus der Personen-Tabelle eingeben.'],
            ];

            return view('startseite')
                . view('menu')
                . view('pages/task_form', $data)
                . view('footer');
        }

        $taskModel = new TaskModel();

        $dataUpdate = [
            'tasks'            => (string) $post['tasks'],
            'taskartenid'      => (int) $post['taskartenid'],
            'personenid'       => $personenId,
            'spaltenid'        => (int) $post['spaltenid'],
            'sortid'           => ($post['sortid'] ?? '') === '' ? null : (int) $post['sortid'],
            'erinnerungsdatum' => ($post['erinnerungsdatum'] ?? '') === '' ? null : (string) $post['erinnerungsdatum'],
            'erinnerung'       => isset($post['erinnerung']) ? 1 : 0,
            'notizen'          => (string) ($post['notizen'] ?? ''),
        ];

        $taskModel->update($id, $dataUpdate);

        return redirect()->to('/tasks');
    }

    public function delete(int $id)
    {
        $taskModel = new TaskModel();
        $taskModel->update($id, ['geloescht' => 1]);

        return redirect()->to('/tasks');
    }
    //8.2
    public function updateSort()
    {
        // JSON-Daten aus dem AJAX-Request lesen
        $json = $this->request->getJSON();

        // Prüfen, ob alle benötigten Daten vorhanden sind
        if ($json && isset($json->id) && isset($json->spaltenid) && isset($json->sortid)) {
            $taskModel = new TaskModel();

            $id = (int) $json->id;

            // Die neuen Werte für Spalte und Position vorbereiten
            $dataUpdate = [
                'spaltenid' => (int) $json->spaltenid,
                'sortid'    => (int) $json->sortid
            ];

            // In der Datenbank aktualisieren
            $taskModel->update($id, $dataUpdate);

            // Dem Browser (JavaScript) eine Erfolgsmeldung zurücksenden
            return $this->response->setJSON(['success' => true]);
        }

        // Falls Fehler auftreten oder Daten fehlen
        return $this->response->setJSON(['success' => false, 'message' => 'Ungültige Daten empfangen']);
    }
}




