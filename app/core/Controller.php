<?php
require_once __DIR__ . '/../core/Blade.php';

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
        if (file_exists(__DIR__ . '/../models/' . $model . '.php')) {
            require_once __DIR__ . '/../models/' . $model . '.php';
            return new $model();
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
