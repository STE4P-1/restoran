form.addEventListener('submit', function (event) {
    event.preventDefault();

    // Собираем данные формы
    const formData = new FormData(form);

    // Отправляем данные на сервер
    fetch('ваш_серверный_скрипт.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            modal.style.display = 'flex'; // Показываем модальное окно
        } else {
            alert('Ошибка при бронировании столика.');
        }
    })
    .catch(error => {
        console.error('Ошибка:', error);
    });
});




const commentSection = document.querySelector('.comment-section');
const comments = document.querySelectorAll('.comment');
let currentIndex = 0;

document.getElementById('next').addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % comments.length; // Увеличиваем индекс с циклом
    updateSlider();
});

document.getElementById('prev').addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + comments.length) % comments.length; // Уменьшаем индекс с циклом
    updateSlider();
});

function updateSlider() {
    const offset = -currentIndex * 100; // Расчет смещения
    commentSection.style.transform = `translateX(${offset}%)`;
}




// Функция для переключения меню
function toggleMenu() {
    const menu = document.querySelector('.nav');
    const burger = document.querySelector('.burger-menu');
    menu.classList.toggle('active'); // Переключаем класс 'active' у навигации
    burger.classList.toggle('active'); // Переключаем класс 'active' у бургера
}

// Функция для автоматического закрытия меню при изменении размера окна
function handleResize() {
    const menu = document.querySelector('.nav');
    const burger = document.querySelector('.burger-menu');

    // Если ширина окна больше или равна 1200px
    if (window.innerWidth >= 1200) {
        // Убираем класс 'active' с меню и бургера
        if (menu && menu.classList.contains('active')) {
            menu.classList.remove('active');
        }
        if (burger && burger.classList.contains('active')) {
            burger.classList.remove('active');
        }
    }
}

// Добавляем обработчик события resize
window.addEventListener('resize', () => {
    handleResize(); // Вызываем функцию при каждом изменении размера окна
});

// Инициализируем проверку при загрузке страницы
handleResize();