<?php

namespace App\Controllers;

class Personen extends BaseController
{
    public function index()
    {
        echo view('pages/personen');
    }
}