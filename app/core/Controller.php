<?php
namespace Core;

class Controller
{
    protected function view($view, $data = [])
    {
        $blade = Blade::getInstance();

        if (file_exists(__DIR__ . '/../views/' . $view . '.blade.php')) {
            echo $blade->run($view, $data);
        } else {
            $this->error(404, 'View not found');
        }
    }

    protected function model($model)
    {
        $modelClass = 'App\\Models\\' . $model;
        if (class_exists($modelClass)) {
            return new $modelClass();
        } else {
            $this->error(500, 'Model not found');
        }
    }

    protected function error($code, $message)
    {
        $blade = Blade::getInstance();
        echo $blade->run('core.Error', ['code' => $code, 'message' => $message]);
        exit;
    }
}