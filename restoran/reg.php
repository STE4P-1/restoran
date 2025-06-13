<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="reg.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <style>
        /* Стили для сообщения об ошибке */
        .error-message {
            display: none; /* Скрыто по умолчанию */
            position: fixed; /* Фиксированное положение */
            bottom: 20px; /* Отступ от низа */
            left: 50%; /* Центрирование по горизонтали */
            transform: translateX(-50%); /* Центрирование */
            background-color: rgba(244, 67, 54, 0.9); /* Светло-красный фон */
            color: white; /* Белый текст */
            padding: 15px;
            border-radius: 5px;
            z-index: 1000; /* Поверх других элементов */
        }
    </style>
</head>
<body>
    
<div class="registration-form">
    <h2>Регистрация</h2>
    <form action="" method="post"> <!-- Отправляем данные на тот же файл -->
        <input type="text" name="username" placeholder="Имя пользователя" required>
        <input type="email" name="email" placeholder="Электронная почта" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <button class="btn" type="submit">Зарегистрироваться</button> <!-- Изменено на type="submit" -->
    </form>
    <p>Уже есть аккаунт? <a href="vhod.php">Войти</a></p>
</div>

<div class="error-message" id="error-message"></div> <!-- Контейнер для сообщения об ошибке -->

<?php
// Подключение к базе данных
$host = '127.0.0.1:3306'; // Хост
$dbname = 'my_site'; // Имя базы данных
$user = 'root'; // Имя пользователя базы данных
$pass = ''; // Пароль базы данных

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

// Обработка данных формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Сохраняем пароль без хэширования

    // Вставка данных в базу данных
    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $password // Сохраняем пароль как есть
        ]);
        
        // Успешная регистрация, перенаправляем на vhod.php
        header("Location: vhod.php");
        exit(); // Завершаем выполнение скрипта
        
    } catch (PDOException $e) {
        if ($e->getCode() === '23000') { // Ошибка уникальности (например, email уже существует)
            echo "<script>document.getElementById('error-message').innerText = 'Ошибка: Пользователь с таким email уже зарегистрирован.'; document.getElementById('error-message').style.display = 'block';</script>";
        } else {
            echo "<script>document.getElementById('error-message').innerText = 'Ошибка: " . addslashes($e->getMessage()) . "'; document.getElementById('error-message').style.display = 'block';</script>";
        }
    }
}
?>

</body>
</html>
