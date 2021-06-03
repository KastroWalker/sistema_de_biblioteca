<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/utils/Log.php';


class Connection
{
    public function __construct()
    {
        $this->user = $_ENV['USER_DATABASE'];
        $this->pass = $_ENV['PASSWORD_DATABASE'];
        $this->host = $_ENV['HOST_DATABASE'];
        $this->database = $_ENV['NAME_DATABASE'];
    }

    public function Connect()
    {
        try {
            $connection = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->user, $this->pass);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $e) {
            Log::createLog($e->getMessage());
        }
    }
}
