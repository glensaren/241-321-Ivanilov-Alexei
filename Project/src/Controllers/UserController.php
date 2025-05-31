<?php

namespace src\Controllers;

use src\Models\Users\User;
use src\View\View;

class UserController
{
    private string $username;
    private string $email;

    public function index(): void
    {
        $users = User::findAll();
        $view = new View();
        $view->renderHtml('users/index', ['users' => $users]);
    }

    public function create(): void
    {
        $view = new View();
        $view->renderHtml('users/create', []);
    }

    public function store(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo 'Method Not Allowed';
            return;
        }

        $user = new User();
        $user->setUsername($_POST['username']);
        $user->setEmail($_POST['email']);
        $user->save();

        header('Location: /241-321-Ivanilov-Alexei/Project/www/?route=users');
        exit;
    }
}
