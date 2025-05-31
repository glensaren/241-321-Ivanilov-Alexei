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

        $article->setAuthor($user);

        $article->createdAt = $_POST['createdAt'];

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($fileType, $allowedTypes)) {
            die('Ошибка: можно загружать только изображения JPG, PNG или GIF');
        }

        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        $uploadFileDir = __DIR__ . '/../../www/images/'; 
        $destPath = $uploadFileDir . $newFileName;

        if(move_uploaded_file($fileTmpPath, $destPath)) {
            // Успешно сохранено, сохраняй путь в статью
            $article->imagePath = '/images/' . $newFileName;
        } else {
            die('Ошибка при загрузке файла');
        }
    }


        $article->save();

        return header('Location:http://localhost/241-321-Ivanilov-Alexei/Project/www/index.php');
    }

    public function delete(int $id){
        $article = Article::getById($id);
        $article->delete();
        return header('Location:http://localhost/241-321-Ivanilov-Alexei/Project/www/index.php');
    }
}