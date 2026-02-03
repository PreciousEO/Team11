<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonenModel extends Model
{

    protected $table      = 'personen';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'vorname',
        'name',
        'email',
        'passwort'
    ];

}
