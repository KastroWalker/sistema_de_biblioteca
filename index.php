<?php
require_once './config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/controllers/User.php';

$response = null;

if ($_POST) {
    $user = new User();

    $response = $user->login($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Biblioteca</title>
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
</head>

<body>
    <main class="container pt-5 d-flex align-items-center flex-column">
        <?php if ($response && $response['status'] == 'error') : ?>
            <div class="alert alert-danger" role="alert">
                <?= $response['message']; ?>
            </div>
        <?php endif ?>

        <h1>Login</h1>

        <div class="shadow p-3 mb-5 bg-body rounded col-lg-8">
            <form method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Usuário</label>
                    <input type="text" name="username" class="form-control" id="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <button type="submit" class="btn btn-primary col-12">Entrar</button>
            </form>
        </div>
    </main>

    <script src="/public/js/bootstrap.min.js"></script>
    <script src="/public/js/popper.min.js"></script>
</body>

</html>