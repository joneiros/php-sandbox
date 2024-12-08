<?php

namespace Jonoros;

use InvalidArgumentException;

class Crud {
    private Database $database;
    private Crud $backupCrudder;

    public function __construct(Database $database)
    {
        $this->database = $database;
        $backupDb = new Database();
        //$this->backupCrudder = new self($backupDb);
    }

    //for when this class fails cuz it sucks
    public function getBackupCrudder(): self {
        return $this->backupCrudder;
    }
    public function getCurrentInstance(): self {
        return $this;
    }


    public function createToDoListItem(string $fooItem): void {
        $this->database->insert($fooItem);
    }

    public function deleteToDoListItem(string $fooItem): void {
        $this->database->insert($fooItem);
    }
}