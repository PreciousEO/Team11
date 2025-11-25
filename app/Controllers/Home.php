<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view ('templates/startseite');
        echo view ('templates/menu');
        echo view ('templates/footer');

    }

}

