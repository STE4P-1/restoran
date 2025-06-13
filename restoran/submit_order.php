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
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$comment = $_POST['comment'];

// Валидация данных
if (empty($name) || empty($address) || empty($phone)) {
    echo json_encode(['status' => 'error', 'message' => 'Пожалуйста, заполните все обязательные поля']);
    exit;
}

// Подготовленный запрос для предотвращения SQL-инъекций
$stmt = $conn->prepare("INSERT INTO orders (name, address, phone, comment) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $address, $phone, $comment);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Заказ успешно отправлен']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Ошибка при отправке заказа']);
}

$stmt->close();
$conn->close();
?>