<?php
require_once 'db.php';
include 'header.php';
include 'menu.php';
echo get_menu_html();

$action = $_GET['action'] ?? 'view';

switch ($action) {
    case 'view':
    include 'view.php';
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $sort_key = $_GET['sort'] ?? 'by_name';

    switch ($sort_key) {
        case 'by_name':
            $sortField = 'last_name';
            break;
        case 'by_date':
            $sortField = 'date_of_birth';
            break;
        case 'by_id':
        default:
            $sortField = 'id';
            break;
    }

    echo renderContactsView($page, 10, $sortField, 'ASC');
    break;
    
    case 'add':
        include 'create.php';
        break;
    case 'update':
        include 'update.php';
        break;
    case 'delete':
        include 'delete.php';
        break;
    default:
        echo "<p>Неверное действие</p>";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>Контактная книга</title>
</head>
<body>
</body>
</html>
