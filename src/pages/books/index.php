<?php
require_once '../header/index.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/controllers/Book.php';

$book = new Book();
$response = $book->getAll();
?>

<div class="d-flex justify-content-between">
    <h1 class="h2">Livros</h1>
    <a href="./create.php" class="btn btn-primary">Adicionar Livro</a>
</div>

<?php
if ($response['status'] == 'success') :
?>
    <table class='table table-light table-hover table-striped mt-3'>
        <thead>
            <tr>
                <th>#</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Editora</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $counter = 1;
            foreach ($response['books'] as $book) :
            ?>
                <tr>
                    <td><?= $counter ?></td>
                    <td><?= $book['title'] ?></td>
                    <td><?= $book['author'] ?></td>
                    <td><?= $book['publisher'] ?></td>
                    <td class="">
                        <a href="./create.php?id=<?= $book['id'] ?>" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar livro">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="./delete.php?id=<?= $book['id'] ?>" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Apagar livro">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            <?php
                $counter++;
            endforeach;
            ?>
        </tbody>
    </table>
<?php
else : ?>
<?php endif ?>

<?php require_once '../footer/index.php' ?>