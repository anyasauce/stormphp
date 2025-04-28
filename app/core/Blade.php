<?php
namespace Core;

use eftec\bladeone\BladeOne;

class Blade
{
    private static $instance;

    public static function getInstance()
    {
        if (!self::$instance) {
            $views = dirname(__DIR__) . '/views';  // Views path
            $cache = dirname(__DIR__) . '/cache';  // Cache path

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
