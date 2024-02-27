<?php

namespace App;

class DatabaseConnection implements DatabaseConnectionInterface
{
    public function connect()
    {
        return true;
    }
}
