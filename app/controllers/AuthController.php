<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\User;
use Core\Blade;

class AuthController extends Controller
{
    public function showWelcome()
    {
        Blade::render('welcome');
    }

    public function showRegisterForm()
    {
        Blade::render('register');
    }

    public function register()
    {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $result = User::register($name, $email, $hashedPassword);

        if (isset($result['success']) && $result['success']) {
            $_SESSION['success'] = 'Registration successful!';
            header('Location: /login');
            exit;
        }

        $_SESSION['error'] = $result['error'];
        header('Location: /register');
        exit;
    }

    public function showLoginForm()
    {
        Blade::render('login');
    }

    public function showProfile()
    {
        Blade::render('profile', ['user' => $_SESSION['user']]);
    }

    public function showDashboard()
    {
        $userModel = new User();
        $users = $userModel->getAllUsers();

        Blade::render('dashboard', [
            'user' => $_SESSION['user'],
            'users' => $users
        ]);
    }

    public function login()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $result = User::login($email);

        if (isset($result['success']) && $result['success']) {
            $user = $result['user'];

            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                $_SESSION['success'] = 'Welcome User!';
                header('Location: /dashboard');
                exit;
            } else {
                $_SESSION['error'] = 'Incorrect password.';
                header('Location: /login');
                exit;
            }
        } else {
            $_SESSION['error'] = $result['error'];
            header('Location: /login');
            exit;
        }
    }

    public function update()
    {
        $id = $_POST['id'] ?? '';
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($id) || empty($name) || empty($email)) {
            $_SESSION['error'] = 'Please fill all fields.';
            header('Location: /dashboard');
            exit;
        }

        $hashedPassword = !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : null;

        $result = User::update($id, $name, $email, $hashedPassword);

        if (isset($result['success']) && $result['success']) {
            $_SESSION['user']['name'] = $name;
            $_SESSION['user']['email'] = $email;
            $_SESSION['success'] = 'User updated successfully.';
            header('Location: /dashboard');
            exit;
        } else {
            $_SESSION['error'] = $result['error'];
            header('Location: /dashboard');
            exit;
        }
    }

    public function delete()
    {
        $id = $_POST['id'] ?? '';

        if (empty($id)) {
            $_SESSION['error'] = 'Please provide the user ID.';
            header('Location: /dashboard');
            exit;
        }

        $result = User::delete($id);

        if (isset($result['success']) && $result['success']) {
            session_destroy();
            $_SESSION['success'] = 'User deleted successfully.';
            header('Location: /');
            exit;
        } else {
            $_SESSION['error'] = $result['error'];
            header('Location: /dashboard');
            exit;
        }
    }

    public function logout()
    {
        session_destroy();
        $_SESSION['success'] = 'You have been logged out.';
        header('Location: /login');
        exit;
    }
}