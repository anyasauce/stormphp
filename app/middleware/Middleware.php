<?php

/**
 * Middleware Class
 *
 * This class contains middleware functions to handle user and admin authentication.
 * It checks if a user is logged in and if the user has the appropriate role for access.
 * 
 * Methods:
 * - userAuth(): Redirects to home if the user is not authenticated.
 * - adminAuth(): Redirects to home if the user is not an admin.
 *
 * Usage:
 * Call Middleware::userAuth() to ensure the user is authenticated.
 * Call Middleware::adminAuth() to ensure the user is an admin.
 *
 * @package App\Middleware
 */
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