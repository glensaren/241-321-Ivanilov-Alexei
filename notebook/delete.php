<?php
require_once 'db.php';

$message = '';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    $contact = getContactById($id);
    
    if ($contact) {
        if (deleteContactById($id)) {
            $message = "Запись с фамилией " . htmlspecialchars($contact['last_name']) . " удалена.";
        } else {
            $message = "Ошибка при удалении записи.";
        }
    } else {
        $message = "Контакт не найден.";
    }
}

$contacts = getAllContactsSortedByName();

?>

<h2>Удаление записи</h2>

<?php if ($message): ?>
    <p><b><?= $message ?></b></p>
<?php endif; ?>

<?php if (count($contacts) === 0): ?>
    <p>Контактов пока нет.</p>
<?php else: ?>
    <ul>
        <?php foreach ($contacts as $c): ?>
            <li>
                <a href="?action=delete&id=<?= htmlspecialchars($c['id']) ?>">
                    <?= htmlspecialchars($c['last_name'] . ' ' . mb_substr($c['first_name'], 0, 1) . '.' . mb_substr($c['patronymic'] ?? '', 0, 1) . '.') ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
