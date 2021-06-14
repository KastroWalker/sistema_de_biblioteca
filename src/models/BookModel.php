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

    public function getBy(array $filter = [], string $filterString = "")
    {
        $fields = '';
        $bind = [];
        $counter = 1;
        $lengthFilter = count($filter);

        if ($filterString) {
            $stmt = $this->connection->prepare("SELECT * FROM {$this->table} WHERE $filterString;");

            $stmt->execute();
        } else {
            foreach ($filter as $key => $value) {
                $fields .= "$key = :$key";

                if ($counter < $lengthFilter) {
                    $fields .= " AND ";
                }

                $counter++;
                $bind[":$key"] = $value;
            }

            $stmt = $this->connection->prepare("SELECT * FROM {$this->table} WHERE $fields;");

            $stmt->execute($bind);
        }

        return $stmt->fetchAll();
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

    public function update(array $data, $filter = null)
    {
        try {
            $fileds = '';
            $filterString = '';
            $bind = [];

            if (is_array($filter)) {
                foreach ($filter as $key => $value) {
                    $filterString = "{$key} = :{$key} ";
                    $bind[":$key"] = $value;
                }
            } else if (is_string($filter)) {
                $filterString = $filter;
            } else {
                throw new Exception("Filter is invalid", 1);
            }

            foreach ($data as $key => $value) {
                $fileds .= "{$key} = :{$key}, ";
                $bind[":$key"] = $value;
            }

            $fileds = substr($fileds, 0, -2);

            $stmt = $this->connection->prepare("UPDATE {$this->table} SET {$fileds} WHERE $filterString");

            $stmt->execute($bind);
        } catch (Exception $ex) {
            Log::createLog($ex);
        }
    }

    public function delete($filter)
    {
        try {
            $filterString = '';
            $bind = [];

            if (is_array($filter)) {
                foreach ($filter as $key => $value) {
                    $filterString = "{$key} = :{$key} ";
                    $bind[":$key"] = $value;
                }
            } else if (is_string($filter)) {
                $filterString = $filter;
            } else {
                throw new Exception("Filter is invalid", 1);
            }

            $stmt = $this->connection->prepare("DELETE FROM {$this->table} WHERE $filterString");

            $stmt->execute($bind);
        } catch (Exception $ex) {
            Log::createLog($ex);
        }
    }
}
