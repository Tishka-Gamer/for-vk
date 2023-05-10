<?php

namespace App\models;

use App\helpers\Connection;

class User
{

    public static function getUser($login, $password)
    {
        $query = Connection::make()->prepare("SELECT * FROM users WHERE login = ?");

        $query->execute([$login]);

        $user = $query->fetch();
        if ($user != null) {
            if (password_verify($password, $user->password)) {
                return $user;
            } else return null;
        }
    }

    public static function insert($data)
    {
        $create = Connection::make()->prepare("INSERT into users ( login, password) values (:login, :password)");

        return $create->execute([
            "login" => $data["login"],
            "password" => password_hash($data["password"], PASSWORD_DEFAULT),
        ]);
    }
    public static function search($login)
    {
        $query = Connection::make()->prepare("SELECT * FROM users WHERE login = ?");

        $query->execute([$login]);

        return $query->fetch() == null;
    }
}
