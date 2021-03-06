<?php
require_once '../header/index.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/controllers/Book.php';

$bookController = new Book();

$response = null;
$id = $_GET['id'];

if ($id) {
    $response = $bookController->getById($id);

    if ($response['status'] == 'success') {
        $book = $response['book'];
    }
}

if ($_POST) {
    if ($book) {
        $response = $bookController->update($_POST, ['id' => $id]);
    } else {
        $response = $bookController->create($_POST);
    }
}
?>

<h1 class="h2">Adicionar Livro</h1>

<form action="" method="POST">
    <div class="mb-3">
        <label for="title" class="form-label">Titulo</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Digite o titulo do livro." value="<?= $book['title'] ?>">
    </div>
    <div class="mb-3">
        <label for="author" class="form-label">Autor</label>
        <input type="text" class="form-control" id="author" name="author" placeholder="Digite o nome do autor" value="<?= $book['author'] ?>">
    </div>
    <div class="mb-3">
        <label for="publisher" class="form-label">Editora</label>
        <input type="text" class="form-control" id="publisher" name="publisher" placeholder="Digite o nome da editora" value="<?= $book['publisher'] ?>">
    </div>
    <!-- <div class="mb-3">
        <label for="cover" class="form-label">Capa</label>
        <input type="file" class="form-control" id="cover" name="cover" placeholder="Selecione uma imagem com a capa do livro">
    </div> -->
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <button type="reset" class="btn btn-secondary">Limpar</button>
        <a class="btn btn-danger">Cancelar</a>
    </div>
</form>

<?php require_once '../footer/index.php' ?>