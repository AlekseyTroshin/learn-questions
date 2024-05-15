<?php

namespace core;

use Exception;

class View
{

    public string $content = '';

    public function __construct(
        public array $route,
        public string $layout = '',
        public string $view = '',
        public array $meta = [],
    )
    {
        $this->layout = $this->layout ?: LAYOUT;
    }

    public function render(array $data)
    {
        extract($data);

        $view_file = APP . "/views/{$this->route['controller']}/{$this->view}.php";

        $layout_file = APP . "/views/layouts/{$this->layout}.php";

        if (is_file($view_file)) {
            ob_start();
            require_once $view_file;
            $this->content = ob_get_clean();
        } else {
            throw new Exception("Не найден вид {$view_file}", 500);
        }

        if (is_file($layout_file)) {
            require_once $layout_file;
        } else {
            throw new Exception("Не найден шаблон {$layout_file}");
        }
    }

    public function getPart($file, array $data = []) : void
    {
        extract($data);
        $file = APP . "/views/{$file}.php";
        if (is_file($file)) {
            require $file;
        } else {
            echo "File {$file} not found";
        }
    }

}