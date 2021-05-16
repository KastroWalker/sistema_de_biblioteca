<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/utils/Connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/utils/Log.php';

abstract class Model
{
    public function __construct()
    {
        $this->connection = new Connection();
        $this->connection = $this->connection->Connect();
    }
}
