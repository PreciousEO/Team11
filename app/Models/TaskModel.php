<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table      = 'tasks';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useTimestamps  = false;

    protected $allowedFields = [
        'personenid',
        'taskartenid',
        'spaltenid',
        'sortid',
        'tasks',
        'erstelldatum',
        'erinnerungsdatum',
        'erinnerung',
        'notizen',
        'erledigt',
        'geloescht',
    ];

    public function getAllTasks(): array
    {
        // alphabetisch nach Bezeichnung (Feld: tasks)
        return $this->orderBy('tasks', 'ASC')->findAll();
    }
}