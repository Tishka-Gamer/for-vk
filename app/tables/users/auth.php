<?php

use App\models\User;

session_start();
unset($_SESSION['error']);

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";


$user = User::getUser($_POST["login"], $_POST['password']);
if (!$adm) {
    $_SESSION["user"] = true;
    require_once $_SERVER["DOCUMENT_ROOT"] . "/view/comments/product.view.php";
} else {
    $_SESSION["user"] = false;
    $_SESSION["error"] = "Такого пользователя не сущесвует или не верный пароль";
    header("Location: /");
}
