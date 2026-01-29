<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\PersonenModel;

class Tasks extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

        $data = [
            'tasks' => $taskModel->getAllTasks(), // sollte geloescht=0 berücksichtigen
        ];

        return view('startseite')
            . view('menu')
            . view('pages/tasks', $data)
            . view('footer');
    }

    public function new()
    {
        $data = [
            'mode'   => 'create',
            'action' => '/public/tasks/create',
            'task'   => [
                'personenid'       => '',
                'taskartenid'      => '',
                'spaltenid'        => '',
                'sortid'           => '',
                'tasks'            => '',
                'erinnerungsdatum' => '',
                'erinnerung'       => 0,
                'notizen'          => '',
            ],
        ];

        return view('startseite')
            . view('menu')
            . view('pages/task_form', $data)
            . view('footer');
    }

    public function create()
    {
        $taskModel = new TaskModel();

        $personenId = (int) $this->request->getPost('personenid');

        // HIER die Prüfung
        $personenModel = new PersonenModel();
        if (!$personenModel->find($personenId)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Personen-ID existiert nicht. Bitte eine gültige ID aus der Personen-Tabelle eingeben.');
        }

        $data = [
            'tasks'            => $this->request->getPost('tasks'),
            'taskartenid'      => (int) $this->request->getPost('taskartenid'),
            'personenid'       => $personenId,
            'spaltenid'        => (int) $this->request->getPost('spaltenid'),
            'sortid'           => (int) $this->request->getPost('sortid'),
            'erinnerungsdatum' => $this->request->getPost('erinnerungsdatum') ?: null,
            'erinnerung'       => $this->request->getPost('erinnerung') ? 1 : 0,
            'notizen'          => $this->request->getPost('notizen'),
            'erledigt'         => 0,
            'geloescht'        => 0,
            'erstelldatum'     => date('Y-m-d'),
        ];

        $taskModel->insert($data);

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
        ];

        return view('startseite')
            . view('menu')
            . view('pages/task_form', $data)
            . view('footer');
    }

    public function update(int $id)
    {
        $taskModel = new TaskModel();

        $data = [
            'tasks'            => (string) $this->request->getPost('tasks'),
            'taskartenid'      => (int) $this->request->getPost('taskartenid'),
            'personenid'       => (int) $this->request->getPost('personenid'),
            'spaltenid'        => (int) $this->request->getPost('spaltenid'),
            'sortid'           => (int) $this->request->getPost('sortid'),
            'erinnerungsdatum' => $this->request->getPost('erinnerungsdatum') ?: null,
            'erinnerung'       => (int) $this->request->getPost('erinnerung'),
            'notizen'          => (string) ($this->request->getPost('notizen') ?? ''),
        ];

        $taskModel->update($id, $data);

        return redirect()->to('/tasks');
    }

    public function delete(int $id)
    {
        $taskModel = new TaskModel();

        // Soft delete über Feld "geloescht"
        $taskModel->update($id, ['geloescht' => 1]);

        return redirect()->to('/tasks');
    }
}
