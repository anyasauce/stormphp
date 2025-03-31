<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use eftec\bladeone\BladeOne;

class Blade
{
    private static $instance;

    public static function getInstance()
    {
        if (!self::$instance) {
            $views = __DIR__ . '/../views';
            $cache = __DIR__ . '/../cache';

            if (!is_dir($cache)) {
                mkdir($cache, 0777, true);
            }

            self::$instance = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);
        }
        return self::$instance;
    }

    public static function render($view, $data = [])
    {
        echo self::getInstance()->run($view, $data);
    }
}
