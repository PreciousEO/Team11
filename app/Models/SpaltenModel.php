<?php

namespace App\Models;

use CodeIgniter\Model;

class SpaltenModel extends Model
{
    protected $table      = 'spalten';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useTimestamps = false;

    // Passt zu deiner DB:
    // id, boardsid, sortid, spalte, spaltenbeschreibung
    protected $allowedFields = [
        'boardsid',
        'sortid',
        'spalte',
        'spaltenbeschreibung',
    ];

    public function getAllSpalten(): array
    {
        return $this->orderBy('sortid', 'ASC')->findAll();
    }
}
