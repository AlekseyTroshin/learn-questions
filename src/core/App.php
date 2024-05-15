<?php

namespace core;

class App
{

    public static $app;

    public function __construct()
    {
        $query = trim(urldecode($_SERVER['QUERY_STRING']), '/');
//        new ErrorHandler();
        session_start();
        self::$app = Registry::getInstence();
        $this->getParams();
        Router::dispatch($query);
    }

    private function getParams()
    {
        $params = require_once CONFIG . '/params.php';
        foreach ($params as $key => $value) {
            self::$app->setProperty($key, $value);
        }
    }

}