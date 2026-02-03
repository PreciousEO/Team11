<?php

namespace App\Controllers;

use App\Models\PersonenModel;

class Personen extends BaseController
{
    public function index()
    {
        $personenModel = new PersonenModel();

        $data['personen'] = $personenModel
            ->orderBy('name', 'ASC')
            ->orderBy('vorname', 'ASC')
            ->findAll();

        return view('startseite')
            . view('menu')
            . view('pages/personen', $data)
            . view('footer');
    }
}
