<?php

namespace App\Models;

use CodeIgniter\Model;

class BoardsModel extends Model
{
    protected $table            = 'Boards';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;

    protected $allowedFields = ['Name'];

    public function getAllBoards(): array
    {
        return $this->select('id, `Name` AS bezeichnung')
            ->orderBy('id', 'ASC')
            ->findAll();
    }

    public function getBoard(int $id): ?array
    {
        return $this->select('id, `Name` AS bezeichnung')
            ->where('id', $id)
            ->first();
    }
}
