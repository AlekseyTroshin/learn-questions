<?php

function debug(mixed $data) : void
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function d(mixed $data) : void
{
    debug($data);
}

function dd(mixed $data) : void
{
    debug($data);
    exit();
}

function redirect(string $http = '') : void
{
    $http = $http ?: ($_SERVER['HTTP_REFERER'] ?? '/');
    header('Location: ' . $http);
    exit();
}

function get(string $key, string $type = 's') : string|int|float
{
    $param = $_GET[$key] ?? '';
    if ($type == 'i') {
        return (int)$param;
    } elseif ($type == 'f') {
        return (float)$param;
    } else {
        return trim($param);
    }
}

function post(string $key, string $type = 's') : string|int|float
{
    $param = $_POST[$key] ?? '';
    if ($type == 'i') {
        return (int)$param;
    } elseif ($type == 'f') {
        return (float)$param;
    } else {
        return trim($param);
    }
}