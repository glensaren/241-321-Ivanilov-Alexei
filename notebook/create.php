<?php
require_once 'db.php';
include 'header.php';
$errors = [];
$success = false;
$row = [
    'last_name' => '',
    'first_name' => '',
    'patronymic' => '',
    'gender' => '',
    'date_of_birth' => '',
    'phone' => '',
    'address' => '',
    'email' => '',
    'comment' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $row = $_POST;

    if (trim($row['last_name']) === '') $errors[] = 'Фамилия обязательна';
    if (trim($row['first_name']) === '') $errors[] = 'Имя обязательно';

    if (empty($errors)) {
        if (addContact($row)) {
            $success = true;
        } else {
            $errors[] = 'Ошибка добавления в базу';
        }
    }
}

$button = 'Создать';
include 'form.php';

if ($success) {
    echo '<p style="color:green;">Контакт успешно добавлен! <a href="index.php">Вернуться к списку</a></p>';
}

if (!empty($errors)) {
    foreach ($errors as $e) {
        echo '<p style="color:red;">' . htmlspecialchars($e) . '</p>';
    }
}
