<?php

namespace src\Controllers;
use src\View\View;
use src\Models\Articles\Article;
use src\Models\Users\User;


class ArticleController
{
    protected $authorId;
    private $view;
    private $db;
    public function __construct()
    {
        $this->view = new View;  
    }

    public function index(){
        $articles = Article::findAll();
        $this->view->renderHtml('article/index', ['articles'=>$articles]);
    }

    public function setAuthorId(\src\Models\Users\User $user): void
        {
            $this->authorId = $user->getId();
        }   

    public function show($id){
        $article = Article::getById($id);
            if ($article == []) 
        {
            $this->view->renderHtml('error/404', [], 404);
            return;
        }
        $this->view->renderHtml('article/show', ['article'=>$article]);
    }

    public function create(){
        $this->view->renderHtml('article/create');
    }

    public function edit($id){
        $article = Article::getById($id);
        $this->view->renderHtml('article/edit', ['article'=>$article]);
    }

    public function update($id){
        $article = Article::getById($id);
        $article->title = $_POST['title'];
        $article->content = $_POST['content'];
        $article->createdAt = $_POST['createdAt'];
        $article->save();
        return header('Location:http://localhost/241-321-Ivanilov-Alexei/Project/www/article/'.$article->getId());
    }

    public function store(){
        $article = new Article;
        $article->title = $_POST['title'];
        $article->content = $_POST['content'];
        $username = trim($_POST['author']);

        if (!empty($username)) {
        $user = User::getByUsername($username);
        }

        if (empty($user)) {
            $user = User::getByUsername('Гость');
        if ($user === null) {
            die('Ошибка: пользователь по умолчанию (Гость) не найден в базе данных');
        }
        }

        // $user = User::getByUsername($username);


        // if ($user === null) {
        //     die('Ошибка: пользователь с таким именем не найден.');
        // }

        $article->setAuthor($user);

        $article->createdAt = $_POST['createdAt'];

        $article->save();

        return header('Location:http://localhost/241-321-Ivanilov-Alexei/Project/www/index.php');
    }

    public function delete(int $id){
        $article = Article::getById($id);
        $article->delete();
        return header('Location:http://localhost/241-321-Ivanilov-Alexei/Project/www/index.php');
    }
}