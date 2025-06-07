<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    if ($id) {
        $data = [
            'id' => $id,
            'last_name' => $_POST['last_name'] ?? '',
            'first_name' => $_POST['first_name'] ?? '',
            'patronymic' => $_POST['patronymic'] ?? '',
            'gender' => $_POST['gender'] ?? '',
            'date_of_birth' => $_POST['date_of_birth'] ?? '',
            'phone' => $_POST['phone'] ?? '',
            'address' => $_POST['address'] ?? '',
            'email' => $_POST['email'] ?? '',
            'comment' => $_POST['comment'] ?? '',
        ];

        if (updateContact($data)) {
            echo "<p style='color: green;'>Контакт успешно обновлён.</p>";
        } else {
            echo "<p style='color: red;'>Ошибка при обновлении контакта.</p>";
        }
    }
}

$contacts = getAllContactsSortedByName();
$selected_id = $_GET['id'] ?? ($_POST['id'] ?? ($contacts[0]['id'] ?? null));
$row = $selected_id ? getContactById($selected_id) : [];
$button = 'Обновить';
?>

<h2>Выберите контакт для редактирования</h2>

<?php if (count($contacts) === 0): ?>
    <p>Контактов пока нет.</p>
<?php else: ?>
    <ul>
        <?php foreach ($contacts as $contact): ?>
            <li style="margin-bottom: 5px; <?= ($contact['id'] == $selected_id) ? 'font-weight: bold; color: red;' : '' ?>">
                <a href="?action=update&id=<?= htmlspecialchars($contact['id']) ?>">
                    <?= htmlspecialchars($contact['last_name'] . ' ' . $contact['first_name']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <hr>

    <?php include 'form.php'; ?>
<?php endif; ?>
