<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table      = 'tasks';
    protected $primaryKey = 'id';

    protected $returnType    = 'array';
    protected $useTimestamps = false;

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
        return $this->orderBy('tasks', 'ASC')->findAll();
    }

    public function getTaskboardData(int $boardId): array
    {
        $builder = $this->db->table('spalten s');

        $builder->select('
            s.id AS spaltenid,
            s.spalte,
            s.spaltenbeschreibung,
            s.sortid AS spalte_sortid,

            t.id AS taskid,
            t.tasks AS taskname,
            t.sortid AS task_sortid,
            t.erinnerungsdatum,
            t.erinnerung,

            p.vorname,
            p.name
        ');

        $builder->join('tasks t', 't.spaltenid = s.id AND t.geloescht = 0', 'left');
        $builder->join('personen p', 'p.id = t.personenid', 'left');

        $builder->where('s.boardsid', $boardId);
        $builder->orderBy('s.sortid', 'ASC');
        $builder->orderBy('t.sortid', 'ASC');

        $rows = $builder->get()->getResultArray();

        $spalten = [];

        foreach ($rows as $r) {
            $sid = (int) $r['spaltenid'];

            if (!isset($spalten[$sid])) {
                $spalten[$sid] = [
                    'id' => $sid,
                    'spalte' => $r['spalte'],
                    'spaltenbeschreibung' => $r['spaltenbeschreibung'],
                    'sortid' => $r['spalte_sortid'],
                    'tasks' => [],
                ];
            }

            if (!empty($r['taskid'])) {
                $person = trim(($r['vorname'] ?? '') . ' ' . ($r['name'] ?? ''));

                $spalten[$sid]['tasks'][] = [
                    'id' => (int) $r['taskid'],
                    'name' => $r['taskname'],
                    'erinnerungsdatum' => $r['erinnerungsdatum'],
                    'erinnerung' => (int) ($r['erinnerung'] ?? 0),
                    'person' => $person,
                    'icon' => 'bi-list-check',
                ];
            }
        }

        return array_values($spalten);
    }
}
