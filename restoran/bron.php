<?php
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

// Переменные для хранения сообщений
$successMessage = "";
$errorMessage = "";

// Проверяем, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $day = $_POST['days'];
    $time = $_POST['hours'];
    $name = $_POST['name'];
    $table_number = $_POST['table-number'];
    $number_of_guests = $_POST['people-count'];

    // Проверяем, что все поля заполнены
    if (empty($day) || empty($time) || empty($name) || empty($table_number) || empty($number_of_guests)) {
        $errorMessage = "Пожалуйста, заполните все поля.";
    } else {
        // Проверяем, существует ли уже бронь на этот столик в это время и день
        $check_stmt = $conn->prepare("SELECT id FROM reservations WHERE day = ? AND time = ? AND table_number = ?");
        $check_stmt->bind_param("ssi", $day, $time, $table_number);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            // Если запись уже существует, выводим сообщение об ошибке
            $errorMessage = "Извините, этот столик уже забронирован на выбранное время и день.";
        } else {
            // Если записи нет, выполняем вставку
            $insert_stmt = $conn->prepare("INSERT INTO reservations (day, time, name, table_number, number_of_guests) VALUES (?, ?, ?, ?, ?)");
            $insert_stmt->bind_param("sssii", $day, $time, $name, $table_number, $number_of_guests);

            if ($insert_stmt->execute()) {
                $successMessage = "Ваш столик успешно забронирован!";
            } else {
                $errorMessage = "Произошла ошибка при бронировании: " . $insert_stmt->error;
            }

            // Закрываем подготовленное выражение
            $insert_stmt->close();
        }

        // Закрываем подготовленное выражение для проверки
        $check_stmt->close();
    }
}

// Закрываем соединение с базой данных
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reservation Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bron.css">
</head>
<body>
    <section class="banner">
        <h2>ЗАКАЖИТЕ СВОЙ СТОЛИК ПРЯМО СЕЙЧАС</h2>
        <div class="card-container">
            <div class="card-img"></div>
            <div class="card-content">
                <h3>Бронирование</h3>
                <form action="" method="post">
                    <div class="form-row">
                        <select name="days" required>
                            <option value="" disabled selected>Выберите день</option>
                            <option value="Понедельник">Понедельник</option>
                            <option value="Вторник">Вторник</option>
                            <option value="Среда">Среда</option>
                            <option value="Четверг">Четверг</option>
                            <option value="Пятница">Пятница</option>
                            <option value="Суббота">Суббота</option>
                            <option value="Воскресенье">Воскресенье</option>
                        </select>
                        <select name="hours" required>
                            <option value="" disabled selected>Выберите время</option>
                            <option value="10:00">10:00</option>
                            <option value="12:00">12:00</option>
                            <option value="14:00">14:00</option>
                            <option value="16:00">16:00</option>
                            <option value="18:00">18:00</option>
                            <option value="20:00">20:00</option>
                            <option value="22:00">22:00</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <input type="text" name="name" placeholder="Имя" required>
                        <select name="table-number" required>
                            <option value="" disabled selected>Номер столика</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="7">9</option>
                            <option value="8">10</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <select name="people-count" required>
                            <option value="" disabled selected>Кол-во человек</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <input type="submit" value="Заказать столик">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Модальное окно -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="modal-title"></h2>
            <p id="modal-message"></p>
            <div class="icon">🎉</div>
        </div>
    </div>

    <script>
        // Получаем элементы
        const modal = document.getElementById('modal');
        const modalTitle = document.getElementById('modal-title');
        const modalMessage = document.getElementById('modal-message');
        const closeBtn = document.querySelector('.close');

        // Функция для отображения модального окна с сообщением
        function showModal(title, message) {
            modalTitle.textContent = title;
            modalMessage.textContent = message;
            modal.style.display = 'flex';
        }

        // Закрытие модального окна при клике на крестик
        closeBtn.addEventListener('click', function () {
            modal.style.display = 'none';
        });

        // Закрытие модального окна при клике вне его
        window.addEventListener('click', function (event) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });

        // Отображение модального окна с сообщением после отправки формы
        <?php if (!empty($successMessage)): ?>
            showModal("Успех!", "<?php echo $successMessage; ?>");
        <?php elseif (!empty($errorMessage)): ?>
            showModal("Ошибка", "<?php echo $errorMessage; ?>");
        <?php endif; ?>
    </script>
</body>
</html>
