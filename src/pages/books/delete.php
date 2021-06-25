<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/controllers/Book.php';
$bookController = new Book();

$id = $_GET['id'];

if ($id) {
    $bookController->delete($id);
    header("Location: index.php");
}
