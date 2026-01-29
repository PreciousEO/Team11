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
        $spaltenModel = new SpaltenModel();

        $data = [
            'boardsid' => (int) $this->request->getPost('boardsid'),
            'sortid' => (int) $this->request->getPost('sortid'),
            'spalte' => (string) ($this->request->getPost('spalte') ?? ''),
            'spaltenbeschreibung' => (string) ($this->request->getPost('spaltenbeschreibung') ?? ''),
        ];

        $spaltenModel->insert($data);

        return redirect()->to('/spalten');
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
        $spaltenModel = new SpaltenModel();

        $data = [
            'boardsid' => (int) $this->request->getPost('boardsid'),
            'sortid' => (int) $this->request->getPost('sortid'),
            'spalte' => (string) ($this->request->getPost('spalte') ?? ''),
            'spaltenbeschreibung' => (string) ($this->request->getPost('spaltenbeschreibung') ?? ''),
        ];

        $spaltenModel->update($id, $data);

        return redirect()->to('/spalten');
    }

    public function delete(int $id)
    {
        $spaltenModel = new SpaltenModel();
        $spaltenModel->delete($id);

        return redirect()->to('/spalten');
    }
}
