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

// Получаем данные из POST-запроса
$author = $_POST['author'];
$comment = $_POST['comment'];
$rating = $_POST['rating'];

// Валидация данных
if (empty($author) || empty($comment) || empty($rating)) {
    echo json_encode(['status' => 'error', 'message' => 'Все поля обязательны для заполнения']);
    exit;
}

// Подготовленный запрос для предотвращения SQL-инъекций
$stmt = $conn->prepare("INSERT INTO comments (author, comment, rating) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $author, $comment, $rating);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Комментарий успешно добавлен']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Ошибка при добавлении комментария']);
}

$stmt->close();
$conn->close();
?>