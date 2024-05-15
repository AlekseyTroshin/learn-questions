<?php

namespace app\controllers;

use app\models\MainModel;

/** @property MainModel $model */
class MainController extends AppController
{

    public function indexAction()
    {
        $cards = $this->model->getCardsDefault();
        $this->set(compact('cards'));
    }

}