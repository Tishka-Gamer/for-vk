<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="auto">
        <h1 class="admin-h1">Авторизоватся</h1>
        <form action="/app/tables/users/auth.php" method="POST" class="admin-form">
            <div class="form-group">
                <label for="login" class="form-label">Login</label>
                <input type="text" name="login" class="form-control" id="login" value="<?= $_SESSION["login"] ?? "" ?>">
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <p class="error"><?= $_SESSION["error"] ?? "" ?></p>
            <div class="form-group">
                <button class="btn_vhod" name="btn">Войти</button>
            </div>
        </form>
    </div>
    <div class="registr">
        <h1 class="admin-h1">Зарегистрироваться</h1>
        <form action="/app/tables/users/reg.php" method="POST" class="admin-form">
            <div class="form-group">
                <label for="login" class="form-label">Login</label>
                <input type="text" name="login" class="form-control" id="login" value="<?= $_SESSION["login"] ?? "" ?>">
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <p class="error"><?= $_SESSION["error"] ?? "" ?></p>
            <div class="form-group">
                <button class="btn_vhod" name="btn">Зарегистрироваться</button>
            </div>
        </form>
    </div>
</body>

</html>





<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/app/admin/view/templates/footer.php'; ?>