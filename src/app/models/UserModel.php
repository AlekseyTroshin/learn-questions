<?php


namespace app\models;

use app\dto\User;
use core\Model;

class UserModel extends Model
{

    public function signin(bool $is_admin = false): bool
    {
        $email = post('email');
        $password = post('password');

        if (!($email && $password)) {
            return false;
        }

        if ($is_admin) {
            $user = self::$db->query(
                "SELECT * FROM `users` WHERE `email` = ? AND `role` = admin",
                [$email],
                User::class
            );
        } else {
            $user = self::$db->query(
                "SELECT * FROM `users` WHERE `email` = ?",
                [$email],
                User::class
            );

        }

        if ($user && password_verify($password, $user->password)) {
            foreach ($user as $k => $v) {
                if ($k === 'password') {
                    continue;
                }

                $_SESSION['user'][$k] = $v;
            }
        }

        return true;
    }

    public function signup() : bool
    {
        if (empty($_POST)) {
            return false;
        }

        $data = [];

        $data[] = $_POST['email'];
        $data[] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $data[] = $_POST['name'];

        self::$db->query(
            "INSERT INTO `users`(email, password, name) VALUES (?, ?, ?)",
            $data,
            User::class
        );

        return true;
    }

    public function checkAuth() : bool
    {
        return isset($_SESSION['user']);
    }

    public function logout()
    {
        if ($this->checkAuth()) {
            unset($_SESSION['user']);
        }

        redirect();
    }

}