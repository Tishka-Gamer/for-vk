<?php

use App\models\User;

session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/bootstrap.php";
if (!$_SESSION["admin"]) {
    header("Location: /");
} else {
    if ($_POST['login'] == "" && $_POST['password'] == "") {
        $_SESSION['error'] = "не заполнены данные";
        header("Location: /");
    } else {
        if (User::search($_POST['login'])) {
            User::insert($_POST['login'], $_POST['password']);
            $_SESSION["user"] = true;
            header("Location: /app/tables/comments/tableAdm.php");
        } else {
            $_SESSION["user"] = false;
            $_SESSION['error'] = "такой логин уже существует";
            header("Location: /");
        }
    }
}