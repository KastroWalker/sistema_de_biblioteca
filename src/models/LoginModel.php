<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/models/Model.php';

class LoginModel extends Model
{
    public function login($username)
    {
        try {
            $stmt = $this->connection->prepare("SELECT user.*, typeUser.name AS type FROM user 
            JOIN typeUser AS typeUser ON user.typeUserID = typeUser.id 
            WHERE user.username = :username");

            $bind[":username"] = $username;

            $stmt->execute($bind);

            $result = $stmt->fetchAll();

            if ($result) {
                return $result[0];
            }
        } catch (\Throwable $th) {
            Log::createLog($th);
        }
    }
}
