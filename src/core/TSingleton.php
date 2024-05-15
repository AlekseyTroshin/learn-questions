<?php


namespace core;


trait TSingleton
{

    private static $instance = null;

    private function __construct()
    {
    }

    public static function getInstence()
    {
        return static::$instance ?? static::$instance = new self();
    }

}