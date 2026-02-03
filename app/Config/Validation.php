<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    public array $spaltebearbeiten = [
        'boardsid'            => 'required|is_natural_no_zero',
        'sortid'              => 'required|is_natural_no_zero',
        'spalte'              => 'required|string|min_length[1]|max_length[255]',
        'spaltenbeschreibung' => 'required|string|max_length[1000]',
    ];

    public array $spaltebearbeiten_errors = [
        'boardsid' => [
            'required'           => 'Bitte wählen Sie ein Board aus.',
            'is_natural_no_zero' => 'Bitte wählen Sie ein gültiges Board aus.',
        ],
        'sortid' => [
            'required'           => 'Bitte geben Sie eine Sort-ID ein.',
            'is_natural_no_zero' => 'Die Sort-ID muss größer als 0 sein.',
        ],
        'spalte' => [
            'required'   => 'Bitte tragen Sie eine Spaltenbezeichnung ein.',
            'min_length' => 'Die Spaltenbezeichnung darf nicht leer sein.',
            'max_length' => 'Die Spaltenbezeichnung ist zu lang (max. 255).',
        ],
        'spaltenbeschreibung' => [
            'required'   => 'Bitte tragen Sie eine Spaltenbeschreibung ein.',
            'max_length' => 'Die Beschreibung ist zu lang (max. 1000).',
        ],
    ];

    // TASKS
    public array $tasks = [
        'tasks'            => 'required|string|min_length[3]|max_length[255]',
        'taskartenid'      => 'required|is_natural_no_zero',
        'personenid'       => 'required|is_natural_no_zero',
        'spaltenid'        => 'required|is_natural_no_zero',
        'sortid'           => 'required|is_natural_no_zero',
        'erinnerungsdatum' => 'required|valid_date',
        'erinnerung'       => 'permit_empty|in_list[0,1]',
        'notizen'          => 'permit_empty|string|max_length[1000]',
    ];

    public array $tasks_errors = [
        'tasks' => [
            'required'   => 'Bitte geben Sie eine Taskbezeichnung ein.',
            'min_length' => 'Die Taskbezeichnung muss mindestens 3 Zeichen haben.',
            'max_length' => 'Die Taskbezeichnung ist zu lang (max. 255).',
        ],
        'taskartenid' => [
            'required'           => 'Bitte geben Sie eine Taskart-ID ein.',
            'is_natural_no_zero' => 'Die Taskart-ID muss größer als 0 sein.',
        ],
        'personenid' => [
            'required'           => 'Bitte geben Sie eine Personen-ID ein.',
            'is_natural_no_zero' => 'Die Personen-ID muss größer als 0 sein.',
        ],
        'spaltenid' => [
            'required'           => 'Bitte wählen Sie eine Spalte aus.',
            'is_natural_no_zero' => 'Die Spalten-ID muss größer als 0 sein.',
        ],
        'sortid' => [
            'required'           => 'Bitte geben Sie eine Sort-ID ein.',
            'is_natural_no_zero' => 'Die Sort-ID muss größer als 0 sein.',
        ],
        'erinnerungsdatum' => [
            'required'   => 'Bitte geben Sie ein Erinnerungsdatum ein.',
            'valid_date' => 'Bitte geben Sie ein gültiges Datum ein.',
        ],
        'erinnerung' => [
            'in_list' => 'Ungültiger Wert für Erinnerung.',
        ],
        'notizen' => [
            'max_length' => 'Notizen sind zu lang (max. 1000).',
        ],
    ];

    // BOARDS (deine Gruppe: boards)

    public array $boards = [
        'bezeichnung' => 'required|min_length[1]|max_length[255]',
    ];

    public array $boards_errors = [
        'bezeichnung' => [
            'required'   => 'Bitte geben Sie eine Bezeichnung für das Board an.',
            'min_length' => 'Bezeichnung darf nicht leer sein.',
            'max_length' => 'Bezeichnung ist zu lang.',
        ],
    ];





}
