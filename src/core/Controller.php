<?php


namespace core;


use Exception;

class Controller
{

    public array $data = [];
    public array $meta = ['title' => '', 'keywords' => '', 'description' => ''];
    public string $layout = '';
    public string $view = '';
    public object $model;

    public function __construct(public $route = [])
    {
    }

    public function getModel()
    {
        $model = 'app\models\\' . $this->route['admin'] . $this->route['controller'] . 'Model';
        if (class_exists($model)) {
            $this->model = new $model();
        } else {
            throw new Exception("Не найдена модель {$model}", 500);
        }
    }

    public function set($data)
    {
        $this->data = $data;
    }

    public function setMeta(string $title = '', string $description = '', string $keywords = '')
    {
        $this->meta = [
            'title' => $title,
            'description' => $description,
            'keywords' => $keywords,
        ];
    }

    public function getView(): void
    {
        $this->view = $this->view ?: $this->route['action'];
        (new View(
            $this->route,
            $this->layout,
            $this->view,
            $this->meta
        ))->render($this->data);
    }

}