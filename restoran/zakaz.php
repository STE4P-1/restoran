<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="zakaz.css">
    <title>Доставка еды</title>
</head>
<body>
    <div class="delivery-form-container">
        <h2>Информация для доставки</h2>
        <p class="p">ПРИМЕЧАНИЕ: Оплата наличными при получении заказа</p>
        <form id="deliveryForm" class="delivery-form">
            <!-- Имя -->
            <div class="form-group">
                <label for="name">Ваше имя:</label>
                <input type="text" id="name" name="name" placeholder="Введите ваше имя" required>
            </div>

            <!-- Адрес -->
            <div class="form-group">
                <label for="address">Адрес доставки:</label>
                <input type="text" id="address" name="address" placeholder="Введите ваш адрес" required>
            </div>

            <!-- Телефон -->
            <div class="form-group">
                <label for="phone">Номер телефона:</label>
                <input type="tel" id="phone" name="phone" placeholder="+7 (___) ___-__-__" required>
            </div>

            <!-- Комментарий -->
            <div class="form-group">
                <label for="comment">Комментарий к заказу:</label>
                <textarea id="comment" name="comment" placeholder="Оставьте комментарий (необязательно)"></textarea>
            </div>

            <!-- Кнопка отправки -->
            <button type="submit" class="submit-btn">Отправить заказ</button>
        </form>
    </div>

    <script>
       // Обработчик отправки формы
document.getElementById('deliveryForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Отменяем стандартное поведение формы

    // Получаем данные из формы
    const name = document.getElementById('name').value.trim();
    const address = document.getElementById('address').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const comment = document.getElementById('comment').value.trim();

    // Проверяем, заполнены ли обязательные поля
    if (!name || !address || !phone) {
        alert('Пожалуйста, заполните все обязательные поля!');
        return;
    }

    // Отправляем данные на сервер
    fetch('submit_order.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `name=${encodeURIComponent(name)}&address=${encodeURIComponent(address)}&phone=${encodeURIComponent(phone)}&comment=${encodeURIComponent(comment)}`,
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert('Заказ успешно отправлен!');
            document.getElementById('deliveryForm').reset(); // Очищаем форму

            // Редирект на index.php
            window.location.href = 'index.php';
        } else {
            alert(data.message); // Показываем сообщение об ошибке
        }
    })
    .catch(error => {
        console.error('Ошибка:', error);
        alert('Произошла ошибка при отправке заказа');
    });
});
    </script>
</body>
</html>


