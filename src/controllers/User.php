<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/models/LoginModel.php';

class User
{
    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }

    public function login($request)
    {
        $username = $request['username'];
        $password = $request['password'];

        $result = $this->loginModel->login($username);

        if ($result && password_verify($password, $result['password'])) {
            header('Location: src/pages/dashboard/');
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Usuário ou senha incorreta. Tente novamente'
            ];

            return $response;
        }
    }
}
