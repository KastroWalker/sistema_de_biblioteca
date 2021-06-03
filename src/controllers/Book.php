<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/models/BookModel.php';

class Book
{
    public function __construct()
    {
        $this->bookModel = new BookModel();
    }

    public function create($request)
    {
        $data = filter_var_array($request, FILTER_SANITIZE_STRIPPED);

        $data['id'] =
            md5(uniqid(rand()));

        $this->bookModel->store($data);
    }

    public function getAll()
    {
        $response = [
            'status' => 'error',
            'message' => 'Erro ao procurar livros'
        ];

        $books = $this->bookModel->getAll();

        if ($books) {
            $response = [
                'status' => 'success',
                'books' => $books
            ];
        }

        return $response;
    }
}
