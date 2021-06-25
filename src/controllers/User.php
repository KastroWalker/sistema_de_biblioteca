<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/models/LoginModel.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/models/UserModel.php';

class User
{
    public function __construct()
    {
        $this->loginModel = new LoginModel();
        $this->userModel = new UserModel();
    }

    public function login($request)
    {
        $username = $request['username'];
        $password = $request['password'];

        $result = $this->loginModel->login($username);

        if ($result && $password) {
            header('Location: src/pages/dashboard/');
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Usuário ou senha incorreta. Tente novamente'
            ];

            return $response;
        }
    }

    public function getAll()
    {
        $response = [
            'status' => 'error',
            'message' => 'Erro ao procurar livros'
        ];

        $user = $this->userModel->getAll();

        if ($user) {
            $response = [
                'status' => 'success',
                'user' => $user
            ];
        }

        return $response;
    }

    public function getById($id)
    {
        $reponse = [
            'status' => 'error',
            'message' => 'Erro ao pegar dados do livro'
        ];

        $filter = ['id' => $id];

        $user = $this->userModel->getBy($filter);

        if ($user) {
            $reponse = [
                'status' => 'success',
                'user' => $user[0]
            ];
        }

        return $reponse;
    }

    public function create($request)
    {
        $data = filter_var_array($request, FILTER_SANITIZE_STRIPPED);

        $this->userModel->store($data);
    }

    public function update($request, $filter)
    {
        $data = filter_var_array($request, FILTER_SANITIZE_STRIPPED);

        $this->userModel->update($data, $filter);
    }

    public function delete($filter)
    {
        $this->userModel->delete($filter);
    }
}
