<?php


namespace core;


use Exception;

class Router
{

    private static string $url;
    private static array $route;
    private static array $routes;
    private static null|string $params;

    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    public static function dispatch(string $url)
    {
        self::divideRouteParams($url);
        self::matchRoute();

        if(self::$route['language']) {
            App::$app->setProperty('language', self::$route['language']);
        }

        $controllerClass = 'app\controllers\\'
            . self::$route['admin']
            . self::upperCamelCase(self::$route['controller'])
            . 'Controller';
        $action = (self::lowerCamelCase(self::$route['action']) . 'Action');
        if (method_exists($controllerClass, $action)) {
            $controller = new $controllerClass(self::$route);
            $controller->getModel();
            $controller->$action();
            $controller->getView();
        } else {
            throw new Exception("Не найден метод {$action}", 400);
        }
    }

    private static function divideRouteParams(string $url): void
    {
        $url = explode('&', $url, 2);
        self::$url = $url[0];
        self::$params = $url[1] ?? null;
    }

    private static function matchRoute(): void
    {
        $regexp = '(?P<admin>admin)?\b\/?(?P<lang>ru|en)?\b\/?(?P<controller>[a-z-]+)?\b\/?(?P<action>[a-z-]+)?\b';
        preg_match("/$regexp/", self::$url, $matches);
        self::$route['admin'] = !empty($matches['admin']) ? 'admin' : '';
        self::$route['language'] = $matches['lang'] ?? '';
        self::$route['controller'] = $matches['controller'] ?? 'Main';
        self::$route['action'] = $matches['action'] ?? 'index';
    }

    private static function upperCamelCase(string $str): string
    {
        return str_replace('-', '', ucwords($str, '-'));
    }

    private static function lowerCamelCase(string $str): string
    {
        return lcfirst(self::upperCamelCase($str));
    }

}