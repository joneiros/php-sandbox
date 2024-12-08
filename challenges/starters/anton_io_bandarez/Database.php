<?php

namespace Jonoros;

use LogicException;

class Database {
    public function insert(string $someItem): void {
        //this is the live database, If our tests touch it, we're fucked.
        throw new LogicException();
    }
}