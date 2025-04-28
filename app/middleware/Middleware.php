<?php
namespace App\Middleware;
class Middleware
{
    public static function userAuth()
    {
        if (!isset($_SESSION['user'])) {
            ?>
            <script>
                window.location.href = '/';
            </script>
            <?php
            exit;
        }
    }

    public static function adminAuth()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            ?>
            <script>
                window.location.href = '/';
            </script>
            <?php
            exit;
        }
    }

}
