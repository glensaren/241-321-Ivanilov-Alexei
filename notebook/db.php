<?php
$host = 'localhost';
$db   = 'notebook';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    exit("Ошибка подключения: " . $e->getMessage());
}

function getAllContacts() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM contacts ORDER BY id DESC");
    return $stmt->fetchAll();
}

function addContact($data) {
    global $pdo;
    $sql = "INSERT INTO contacts 
        (first_name, last_name, patronymic, gender, date_of_birth, phone, address, email, comment, created_at)
        VALUES (:first_name, :last_name, :patronymic, :gender, :date_of_birth, :phone, :address, :email, :comment, NOW())";
    
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':first_name' => $data['first_name'],
        ':last_name' => $data['last_name'],
        ':patronymic' => $data['patronymic'],
        ':gender' => $data['gender'],
        ':date_of_birth' => $data['date_of_birth'],
        ':phone' => $data['phone'],
        ':address' => $data['address'],
        ':email' => $data['email'],
        ':comment' => $data['comment'] ?? '',
    ]);
}

function getContactById($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM contacts WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function updateContact(array $data): bool {
    global $pdo;

    $sql = "
        UPDATE contacts SET
            last_name = :last_name,
            first_name = :first_name,
            patronymic = :patronymic,
            gender = :gender,
            date_of_birth = :date_of_birth,
            phone = :phone,
            address = :address,
            email = :email,
            comment = :comment
        WHERE id = :id
    ";

    $stmt = $pdo->prepare($sql);
    return $stmt->execute($data);
}

function deleteContactById($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM contacts WHERE id = ?");
    return $stmt->execute([$id]);
}

function getAllContactsSortedByName() {
    global $pdo;
    $stmt = $pdo->query("SELECT id, first_name, last_name FROM contacts ORDER BY last_name, first_name");
    return $stmt->fetchAll();
}





function getContactsPage(int $page = 1, int $perPage = 10, string $sortField = 'id', string $sortOrder = 'DESC'): array {
    global $pdo;
    
    $allowedSortFields = ['id', 'last_name', 'first_name', 'date_of_birth']; // список разрешённых полей сортировки
    $allowedSortOrders = ['ASC', 'DESC'];
    
    if (!in_array($sortField, $allowedSortFields)) {
        $sortField = 'id';
    }
    if (!in_array(strtoupper($sortOrder), $allowedSortOrders)) {
        $sortOrder = 'DESC';
    }
    
    $offset = ($page - 1) * $perPage;
    
    $sql = "SELECT * FROM contacts ORDER BY $sortField $sortOrder LIMIT :limit OFFSET :offset";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getTotalContactsCount(): int {
    global $pdo;
    $stmt = $pdo->query("SELECT COUNT(*) FROM contacts");
    return (int)$stmt->fetchColumn();
}


?>

