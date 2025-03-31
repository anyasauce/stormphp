<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../core/Blade.php';

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        Blade::render('register');
    }

    public function register()
    {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';

        $result = User::register($name, $email);

        if (isset($result['success']) && $result['success']) {
            ?>
            <script>
                alert('Registration successful!');
                window.location.href = '/register';
            </script>
            <?php
        } else {
            echo $result['error'];
        }
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

        $result = User::login($email);

        if (isset($result['success']) && $result['success']) {
            $_SESSION['user'] = $result['user'];

            ?>
            <script>
                alert('Login successful!');
                window.location.href = '/dashboard';
            </script>
            <?php
        } else {
            ?>
            <script>
                alert('<?= $result['error']; ?>');
                window.location.href = '/';
            </script>
            <?php
        }
    }

    public function update()
    {
        $id = $_POST['id'] ?? '';
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';

        if (empty($id) || empty($name) || empty($email)) {
            echo "Please fill all fields.";
            return;
        }

        $result = User::update($id, $name, $email);

        if (isset($result['success']) && $result['success']) {
            $_SESSION['user']['name'] = $name;
            $_SESSION['user']['email'] = $email;

            ?>
            <script>
                alert('Profile updated successfully!');
                window.location.href = '/dashboard';
            </script>
            <?php
        } else {
            echo $result['error'];
        }
    }

    public function delete()
    {
        $id = $_POST['id'] ?? '';

        if (empty($id)) {
            echo "Please provide the user ID.";
            return;
        }

        $result = User::delete($id);

        if (isset($result['success']) && $result['success']) {
            session_destroy();
            ?>
            <script>
                window.location.href = '/';
            </script>
            <?php
            exit;
        } else {
            echo $result['error'];
        }
    }

    public function logout()
    {
        session_destroy();
        ?>
        <script>
            window.location.href = '/';
        </script>
        <?php
        exit;
    }
}
