<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/models/Model.php';

class BookModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "book";
    }

    public function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM {$this->table};");

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $ex) {
            Log::createLog($ex);
        }
    }

    public function store(array $data)
    {
        try {
            $keys = array_keys($data);
            $values = ':' . implode(',:', $keys);
            $fields = implode(",", $keys);

            $stmt = $this->connection->prepare("INSERT INTO {$this->table} ({$fields}) VALUES ({$values})");

            $stmt->execute($data);
        } catch (Exception $ex) {
            Log::createLog($ex);
        }
    }
}
