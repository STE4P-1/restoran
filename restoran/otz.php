<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="otz.css">
    <title>Отзывы о ресторане</title>
</head>

<body>

    <div class="container">
        <header>
            <div class='otzv-title'>
                Ваши <span>Отзывы</span>
            </div>
        </header>

        <main>
            <div class="comments-container">
                <!-- Форма для добавления нового комментария -->
                <div class="form-container">
                    <form class="add-comment-form" id="addCommentForm">
                        <h3 class="form-title">Оставьте свой отзыв</h3>
                        <div class="rating-input">
                            <span class="star" data-rating="1">★</span>
                            <span class="star" data-rating="2">★</span>
                            <span class="star" data-rating="3">★</span>
                            <span class="star" data-rating="4">★</span>
                            <span class="star" data-rating="5">★</span>
                            <input type="hidden" id="ratingValue" name="rating" value="0">
                        </div>
                        <textarea name="comment" id="commentInput" placeholder="Напишите ваш отзыв здесь..." required></textarea>
                        <input type="text" id="authorInput" placeholder="Ваше имя" required>
                        <button type="submit" class="submit-button">Отправить</button>
                    </form>
                </div>

                <!-- Блок с комментариями -->
                <div class="comments-block">
                    <!-- Комментарии будут загружены сюда -->
                </div>
            </div>
        </main>
    </div>

    


    <script>
        // Обработчик для звезд рейтинга
        document.querySelectorAll('.rating-input .star').forEach((star) => {
            star.addEventListener('click', () => {
                const rating = star.dataset.rating; // Получаем значение рейтинга
                document.getElementById('ratingValue').value = rating; // Сохраняем в hidden input
                updateStars(rating); // Обновляем состояние звезд
            });

            star.addEventListener('mouseover', () => {
                const rating = star.dataset.rating; // Получаем значение рейтинга
                highlightStars(rating); // Подсвечиваем звезды при наведении
            });

            star.addEventListener('mouseout', () => {
                const currentRating = document.getElementById('ratingValue').value; // Текущее выбранное значение
                if (currentRating) {
                    updateStars(currentRating); // Возвращаем выбранные звезды
                } else {
                    resetStars(); // Сбрасываем все звезды, если нет выбранного значения
                }
            });
        });

        // Функция для подсветки звезд при наведении
        function highlightStars(rating) {
            document.querySelectorAll('.rating-input .star').forEach((star, index) => {
                if (index < rating) {
                    star.classList.add('hover'); // Добавляем класс hover для подсветки
                } else {
                    star.classList.remove('hover'); // Убираем класс hover
                }
            });
        }

        // Функция для обновления состояния звезд
        function updateStars(rating) {
            document.querySelectorAll('.rating-input .star').forEach((star, index) => {
                if (index < rating) {
                    star.classList.add('active'); // Подсвечиваем активные звезды
                    star.classList.remove('hover'); // Убираем класс hover
                } else {
                    star.classList.remove('active'); // Сбрасываем остальные
                    star.classList.remove('hover'); // Убираем класс hover
                }
            });
        }

        // Функция для сброса всех звезд
        function resetStars() {
            document.querySelectorAll('.rating-input .star').forEach((star) => {
                star.classList.remove('active'); // Сбрасываем активные звезды
                star.classList.remove('hover'); // Сбрасываем hover-эффект
            });
        }
    </script>



<script src=comment.js></script>
</body>
</html>
