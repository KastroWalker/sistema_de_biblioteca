<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/models/BookModel.php';

class Book
{
    public function __construct()
    {
        $this->bookModel = new BookModel();
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

    public function getById($id)
    {
        $reponse = [
            'status' => 'error',
            'message' => 'Erro ao pegar dados do livro'
        ];

        $filter = ['id' => $id];

        $book = $this->bookModel->getBy($filter);

        if ($book) {
            $reponse = [
                'status' => 'success',
                'book' => $book[0]
            ];
        }

        return $reponse;
    }

    public function create($request)
    {
        $data = filter_var_array($request, FILTER_SANITIZE_STRIPPED);

        $this->bookModel->store($data);
    }

    public function update($request, $filter)
    {
        $data = filter_var_array($request, FILTER_SANITIZE_STRIPPED);

        $this->bookModel->update($data, $filter);
    }

    public function delete($filter)
    {
        $this->bookModel->delete($filter);
    }
}
