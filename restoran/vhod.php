<?php
session_start(); // Запуск сессии

// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_site";

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Переменная для хранения сообщения об ошибке
$error_message = "";	

// Обработка формы входа
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Подготовка и выполнение SQL запроса для получения пользователя по email
    $stmt = $conn->prepare("SELECT password FROM users WHERE email=?");
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) { // Проверяем, что пользователь найден
            // Получаем хеш пароля из базы данных
            $stmt->bind_result($hashed_password);
            $stmt->fetch();

            // Проверка пароля
            if (password_verify($pass, $hashed_password)) {
                $_SESSION['email'] = $email; // Устанавливаем сессию для авторизованного пользователя
                header("Location: index.php"); // Перенаправление на главную страницу
                exit();
            } else {
                $error_message = "Неверный пароль."; // Сообщение об ошибке неверного пароля
            }
        } else {
            $error_message = "Пользователь не найден."; // Сообщение об ошибке, если пользователь не найден
        }
        $stmt->close();
    } else {
        $error_message = "Ошибка подготовки запроса."; // Сообщение об ошибке при подготовке запроса
    }
}

// Закрытие соединения
$conn->close();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="vhod.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
</head>
<body>
    
<div class="login-form">
    <h2>Вход</h2>
    <form action="" method="post"> <!-- Отправляем данные на тот же файл -->
        <input type="text" name="email" placeholder="Электронная почта" required> <!-- Изменено на email -->
        <input type="password" name="password" placeholder="Пароль" required>
        <button class="btn" type="submit">Войти</button> <!-- Изменено на type="submit" -->
        <p>Нет аккаунта? <a href="reg.php">Зарегистрироваться</a></p>
    </form>
    
    <?php if ($error_message): ?>
        <div style="color: red; text-align: center;"><?php echo htmlspecialchars($error_message); ?></div> <!-- Отображение сообщения об ошибке -->
    <?php endif; ?>
</div>
</body>
</html>
