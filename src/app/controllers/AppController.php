<?php

namespace app\controllers;

use core\Model;
use core\App;
use core\Controller;

class AppController extends Controller
{

    public function __construct(array $route)
    {
        parent::__construct($route);
        new Model();
    }

}