<?php

namespace App\Controllers;

use App\Models\SpaltenModel;

class Spalten extends BaseController
{

    public function index()
    {
        $spaltenModel = new SpaltenModel();

        $data = [
            'spalten' => $spaltenModel->getAllSpalten(),
        ];

        return view('startseite')
            . view('menu')
            . view('pages/spalte', $data)
            . view('footer');
    }

    public function new()
    {
        $data = [
            'mode'   => 'create',
            'action' => '/public/spalten/create',
            'spalte' => [
                'boardsid' => '',
                'sortid' => '',
                'spalte' => '',
                'spaltenbeschreibung' => '',
            ],
        ];

        return view('startseite')
            . view('menu')
            . view('pages/spalte_form', $data)
            . view('footer');
    }

    public function create()
    {
        $postData = $this->request->getPost();

        if ($this->validation->run($postData, 'spaltebearbeiten')) {
            $spaltenModel = new SpaltenModel();

            $data = [
                'boardsid' => (int) $postData['boardsid'],
                'sortid' => (int) $postData['sortid'],
                'spalte' => (string) ($postData['spalte'] ?? ''),
                'spaltenbeschreibung' => (string) ($postData['spaltenbeschreibung'] ?? ''),
            ];

            $spaltenModel->insert($data);

            return redirect()->to('/spalten');
        } else {
            $data = [
                'spalte' => $postData,
                'validation' => $this->validation,
                'mode' => 'create',
                'action' => '/public/spalten/create',
                'error' => $this->validation->getErrors(),
            ];

            return view('startseite')
                . view('menu')
                . view('pages/spalte_form', $data)
                . view('footer');
        }
    }

    public function edit(int $id)
    {
        $spaltenModel = new SpaltenModel();
        $spalte = $spaltenModel->find($id);

        if (!$spalte) {
            return redirect()->to('/spalten');
        }

        $data = [
            'mode'   => 'update',
            'action' => "/public/spalten/update/$id",
            'spalte' => $spalte,
        ];

        return view('startseite')
            . view('menu')
            . view('pages/spalte_form', $data)
            . view('footer');
    }

    public function update(int $id)
    {
        $postData = $this->request->getPost();

        if ($this->validation->run($postData, 'spaltebearbeiten')) {
            $spaltenModel = new SpaltenModel();

            $data = [
                'boardsid' => (int) $postData['boardsid'],
                'sortid' => (int) $postData['sortid'],
                'spalte' => $postData['spalte'],
                'spaltenbeschreibung' => $postData['spaltenbeschreibung'],
            ];

            $spaltenModel->update($id, $data);

            return redirect()->to('/spalten');
        } else {
            $data = [
                'spalte' => $postData,
                'validation' => $this->validation,
                'mode' => 'update',
                'action' => "/public/spalten/update/$id",
                'error' => $this->validation->getErrors(),
            ];

            return view('startseite')
                . view('menu')
                . view('pages/spalte_form', $data)
                . view('footer');
        }
    }

    public function delete(int $id)
    {
        $spaltenModel = new SpaltenModel();
        $spaltenModel->delete($id);

        return redirect()->to('/spalten');
    }
}