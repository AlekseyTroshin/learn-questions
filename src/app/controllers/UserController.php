<?php

namespace app\controllers;

use app\models\UserModel;

/**
 * @property  UserModel $model
 */
class UserController extends AppController
{

    public function signinAction()
    {
        if (!$this->model->checkAuth()) {
            $this->model->signin();
        }
    }

    public function signupAction()
    {
        $this->model->signup();
    }

    public function logoutAction()
    {
        $this->model->logout();
    }

}