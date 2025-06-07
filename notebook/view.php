<?php
require_once 'db.php';

function renderContactsView(int $page = 1, int $perPage = 10, string $sortField = 'id', string $sortOrder = 'ASC'): string {
    $contacts = getContactsPage($page, $perPage, $sortField, $sortOrder);
    $total = getTotalContactsCount();
    $totalPages = (int)ceil($total / $perPage);

    if (count($contacts) === 0) {
        return "<p>Контактов пока нет.</p>";
    }
    $baseUrl = "?action=view";
    $sortLinks = [
        'id' => "$baseUrl&sort=id&order=" . ($sortField === 'id' && $sortOrder === 'ASC' ? 'DESC' : 'ASC'),
        'last_name' => "$baseUrl&sort=last_name&order=" . ($sortField === 'last_name' && $sortOrder === 'ASC' ? 'DESC' : 'ASC'),
        'date_of_birth' => "$baseUrl&sort=date_of_birth&order=" . ($sortField === 'date_of_birth' && $sortOrder === 'ASC' ? 'DESC' : 'ASC'),
    ];

    ob_start();
    ?>
    <hr>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th><a href="<?= $sortLinks['id'] ?>">ID</a></th>
            <th><a href="<?= $sortLinks['last_name'] ?>">Фамилия</a></th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Пол</th>
            <th><a href="<?= $sortLinks['date_of_birth'] ?>">Дата рождения</a></th>
            <th>Телефон</th>
            <th>Адрес</th>
            <th>Email</th>
            <th>Комментарий</th>
            <th>Дата создания</th>
        </tr>
        <?php foreach ($contacts as $c): ?>
            <tr>
                <td><?= htmlspecialchars($c['id']) ?></td>
                <td><?= htmlspecialchars($c['last_name']) ?></td>
                <td><?= htmlspecialchars($c['first_name']) ?></td>
                <td><?= htmlspecialchars($c['patronymic']) ?></td>
                <td><?= htmlspecialchars($c['gender']) ?></td>
                <td><?= htmlspecialchars($c['date_of_birth']) ?></td>
                <td><?= htmlspecialchars($c['phone']) ?></td>
                <td><?= htmlspecialchars($c['address']) ?></td>
                <td><?= htmlspecialchars($c['email']) ?></td>
                <td><?= htmlspecialchars($c['comment']) ?></td>
                <td><?= htmlspecialchars($c['created_at']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php if ($totalPages > 1): ?>
        <div style="margin-top: 10px;">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?action=view&page=<?= $i ?>&sort=<?= urlencode($sortField) ?>&order=<?= urlencode($sortOrder) ?>"
                   style="padding: 5px; margin-right: 5px; text-decoration: none; border: 1px solid transparent;"
                   onmouseover="this.style.border='2px solid black';"
                   onmouseout="this.style.border='1px solid transparent';"
                >
                    <?= $i ?>
                </a>
            <?php endfor; ?>
        </div>
    <?php endif; ?>

    <?php
    return ob_get_clean();
}


