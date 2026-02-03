<?php

namespace App\Controllers;

use App\Models\BoardsModel;

class Boards extends BaseController
{
    public function index()
    {
        $boardsModel = new BoardsModel();

        $data = [
            'boards'     => $boardsModel->getAllBoards(),
            'validation' => session('validation'),
        ];

        return view('startseite')
            . view('menu')
            . view('pages/boards', $data)
            . view('footer');
    }

    public function new()
    {
        $data = [
            'mode'       => 'create',
            'action'     => '/public/boards/create',
            'validation' => session('validation'),
            'board'      => [
                'bezeichnung' => '',
            ],
        ];

        return view('startseite')
            . view('menu')
            . view('pages/board_form', $data)
            . view('footer');
    }

    public function create()
    {
        $postData = $this->request->getPost();

        if (! $this->validation->run($postData, 'boards')) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }

        $boardsModel = new BoardsModel();

        // Form: bezeichnung -> DB: Name
        $boardsModel->insert([
            'Name' => (string) ($postData['bezeichnung'] ?? ''),
        ]);

        return redirect()->to('/boards');
    }

    public function edit(int $id)
    {
        $boardsModel = new BoardsModel();
        $board = $boardsModel->getBoard($id);

        if (! $board) {
            return redirect()->to('/boards');
        }

        $data = [
            'mode'       => 'update',
            'action'     => "/public/boards/update/$id",
            'validation' => session('validation'),
            'board'      => $board, // enthält id + bezeichnung (aus Model alias)
        ];

        return view('startseite')
            . view('menu')
            . view('pages/board_form', $data)
            . view('footer');
    }

    public function update(int $id)
    {
        $postData = $this->request->getPost();

        if (! $this->validation->run($postData, 'boards')) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }

        $boardsModel = new BoardsModel();

        $boardsModel->update($id, [
            'Name' => (string) ($postData['bezeichnung'] ?? ''),
        ]);

        return redirect()->to('/boards');
    }

    public function delete(int $id)
    {
        $boardsModel = new BoardsModel();
        $boardsModel->delete($id);

        return redirect()->to('/boards');
    }
}
