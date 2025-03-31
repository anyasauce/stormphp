<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/User.php';

class HomeController extends Controller
{
    public function index()
    {
        $userModel = new User();
        $users = $userModel->getUsers();
        $this->view('home', ['users' => $users]);
    }
}
