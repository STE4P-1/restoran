<?php
header('Content-Type: application/json'); // Указываем, что возвращаем JSON

// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_site";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Ошибка подключения к базе данных']));
}

// Запрос для получения комментариев
$sql = "SELECT author, comment, rating, created_at FROM comments ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $comments = [];
    while ($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }
    echo json_encode(['status' => 'success', 'comments' => $comments]);
} else {
    echo json_encode(['status' => 'success', 'comments' => []]);
}

$conn->close();
?>