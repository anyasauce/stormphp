<?php
require_once __DIR__ . '/../core/Controller.php';

class AboutController extends Controller
{
    public function index()
    {
        require_once __DIR__ . '/../views/about.php';
    }
}
