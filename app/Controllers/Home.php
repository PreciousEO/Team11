<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view ('startseite');
        echo view ('menu');
        echo view ('footer');

    }

}

