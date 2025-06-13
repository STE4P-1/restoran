<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='style.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tinos:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital@1&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ресторан</title>
</head>
<body>


    <!-- HEADER -->
    <div class='header'>
        <div class='container'>
            <div class="header-top">
                <div id="glav" class="header-logo">
                    <img src="img/logo.png" alt="">
                </div>

                <!-- Бургер-меню -->
                <div class="burger-menu" onclick="toggleMenu()">☰</div>

                <!-- Навигация -->
                <div class="nav">
                    <a class="nav-item" href="#glav">ГЛАВНАЯ</a>
                    <a class="nav-item" href="#menu">МЕНЮ</a>
                    <a class="nav-item" href="otz.php">ОТЗЫВЫ</a>
                    <a class="nav-item" href="zakaz.php">ДОСТАВКА</a>
                </div>

                <div class="phone">
                    <div class="phone-holder">
                        <div class="phone-img">
                            <img src="img/phone.png" alt="">
                        </div>
                        <div class="number"><a class="num" href="#">+999-888-76-54</a></div>
                    </div>
                    <div class="phone-text">
                        Свяжитесь с нами <br> для бронирования
                    </div>
                </div>

                <div class="btn">
                    <a href="reg.php">
                        <img class="reg" src="img/reg.png" alt="">
                    </a>
                    <a class="button" href="bron.php">ЗАКАЗ СТОЛИКА</a>
                </div>
            </div>
        </div>


        <div class='header-down'>
            <div class='header-title'>
                Добро пожаловать в
    
                <div class='header-subtitle'>
                    Наш ресторан
                </div>
    
                <div class='header-suptitle'>
                    ДОМ ЛУЧШЕЙ ЕДЫ
                </div>
    
                <div class='header-bth'>
                    <a href='#menu' class='header-button'>смотреть меню</a>
                </div>
            </div>
        </div>
    </div>
    

    
    <!--  HEADER  -->




<div class='cards'>

    <div class='container'>

       <div class='cards-holder'>

            <div class='card'>

                <div class='card-image'>
                    <img class='card-img' src='img/card.png'>
                </div>

                <div class='card-title'>
                    Магическая  <span>Атмосфера</span>
                </div>

                <div class='card-desc'>
                    В нашем заведении царит магическая атмосфера наполненная вкусными ароматами
                </div>

            </div>

            <div class='card'>

                <div class='card-image'>
                    <img class='card-img' src='img/card.png'>
                </div>

                <div class='card-title'>
                    Лучшее качество  <span>Еды</span>
                </div>

                <div class='card-desc'>
                    Качество нашей еды - отменное!

                </div>

            </div>

            <div class='card'>

                <div class='card-image'>
                    <img class='card-img' src='img/card.png'>
                </div>

                <div class='card-title'>
                   Недорогая  <span>Еда</span>
                </div>

                <div class='card-desc'>
                    Стоимость нашей еды зависит только от ее количества. Качество всегда на высоте!
                </div>

            </div>
        </div>
    </div>

</div>


<div class='history'>

    <div class='container'>

        <div class='history-holder'>
            <div class='history-info'>
                <div class='history-title'>
                    Наша <span>История</span>
                </div>

                <div class='history-desc'>
                    Как и у любого другого самобытного места, у нас есть своя, особая история. Идея ресторана пришла основателям неожиданно. Во время прогулки по лесу создатель нашего ресторана застрял в сотнях километров от ближайшего населенного пункта. Вдали от цивилизации и связи им пришлось навремя обустровать себе нехитрый быт, добывать и готовить себе еду.
                </div>


                <div class='history-number'>
                    <div class='number-item'>
                        93 <span>Напитки</span>
                    </div>

                    <div class='number-item'>
                        206 <span>Еда</span>
                    </div>

                    <div class='number-item'>
                        71 <span>Закуски</span>
                    </div>
                </div>
            </div>

            <div class='history-images'>
                <img class='imgages-1' src="img/1.jpg" alt="">
                <img class='imgages-2' src="img/2.jpg" alt="">
                <img class='imgages-3' src="img/3.jpg" alt="">
        </div>
        </div>

    </div>

</div>


<div class='black-block'>

    <div class='container'>

        <div class='block-holder'>
            <div class='left'>
                <div class='left-title'>
                    Отпразднуйте в одном из <br> самых лучших ресторанов.
                </div>

                <div class='left-text'>
                    Только в этом месяце бизнес-ланч от 250 ₽
                </div>
            </div>

            <div class='right'>
                <div class='right-button'>
                    <a href='bron.php' class='right-btn'>ЗАКАЗ СТОЛИКА</a>
                </div>
            </div>
        </div>

    </div>

</div>


<div class='dishes'>

    <div class='container'>

        <div class='dishes-title'>
            Наши <span>Блюда</span>
        </div>

        <div class='burgers'>
            <div class='burgers-image'>
                <img src='img/pizza.jpg' class='pizza'>
            </div>

            <div class='burgers-items'>
                <div class='burger-item'>
                    <img class="burger-photo" src="img/tomyam.jpg" alt="">
                    <div class='burger-text'>
                        Том ям -------------- 690 ₽
                    </div>
                </div>

                <div class='burger-item'>
                    <img class="burger-photo" src="img/tartar.jpg" alt="">
                    <div class='burger-text'>
                        Тартар -------------- 720 ₽
                    </div>
                </div>

                <div class='burger-item'>
                    <img class="burger-photo" src="img/borsh.jpg" alt="">
                    <div class='burger-text'>
                        Борщ ---------------- 350 ₽
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


<div class='menu'>
    <div class='container'>

        <div id="menu" class='menu-title'>
            Наше <span>Меню</span>
        </div>

        <div class='menu-items'>

            <div class='menu-item'>
                <div class='menu-image'>
                    <img src='img/chashushuli.jpg' class='menu-img'>
                </div>

                <div class='menu-text'>
                    Чишашули
                </div>

                <div class='menu-subtext'>
                    Мясо, тушеное в собственном соку<br> и остром томатном соусе
                </div>

                <div class='menu-button'>
                    <a href='zakaz.php'  class='menu-btn'>ЗАКАЗАТЬ</a>

                </div>
            </div>

            <div class='menu-item'>
                <div class='menu-image'>
                    <img src='img/karbonara.jpg' class='menu-img'>
                </div>

                <div class='menu-text'>
                    Паста карбонара(классическая)
                </div>

                <div class='menu-subtext'>
                    спагетти или ригатони<br> с мелкими кусочками гуанчале
                </div>

                <div class='menu-button'>
                    <a href='zakaz.php' class='menu-btn'>ЗАКАЗАТЬ</a>
                </div>
            </div>

            <div class='menu-item'>
                <div class='menu-image'>
                    <img src='img/fritata.jpg' class='menu-img'>
                </div>

                <div class='menu-text'>
                    Фриттата с грибами
                </div>

                <div class='menu-subtext'>
                    фриттата с шампиньонами,<br> сыром и шпинатом
                </div>

                <div class='menu-button'>
                    <a href='zakaz.php' class='menu-btn'>ЗАКАЗАТЬ</a>
                </div>
            </div>
        </div>

    </div>

</div>





<div class='galery'>

    <div class='container'>

        <div class='galery-title'>
            Галерея <span>Блюд</span>
        </div>


        <div class='galery-content'>

            <div class='galery-left'>

                <div class='galery-up'>
                    <img class='img-gal-high' src="img/50.jpg">
                </div>

                <div class='galery-down'>
                    <img class='img-gal' src="img/40.jpg">
                    <img class='img-gal' src="img/60.jpg">
                </div>

            </div>

            <div class='galery-right'>

                 <div class='galery-up'>
                    <img class='img-gal' src="img/20.jpg">
                    <img class='img-gal' src="img/30.jpg">
                </div>

                <div class='galery-down'>
                    <img class='img-gal-high' src="img/10.jpg">
                </div>
            </div>
        </div>
    </div>
</div>





<div class='cook'>
    <div class='container'>
        <div class='cook-title'>
            Наши <span>Повара</span>
        </div>

        <div class='cook-content'>
            <img src='img/1c.jpg'>
            <img src='img/2c.jpg'>
            <img src='img/3c.jpg'>
        </div>
    </div>
</div>



<div class="map">
    <div class="container">
        <div class="map-title">
            Наше <span>Mестоположение</span>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2163.8605404835853!2d65.53395247724985!3d57.156540583007036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43bbe16199d56901%3A0x54c482aa2411e40a!2z0YPQuy4g0JTQt9C10YDQttC40L3RgdC60L7Qs9C-LCAzMSwg0KLRjtC80LXQvdGMLCDQotGO0LzQtdC90YHQutCw0Y8g0L7QsdC7LiwgNjI1MDAw!5e0!3m2!1sru!2sru!4v1738659478439!5m2!1sru!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="map-hours">
        <p>Часы работы:</p>
        <p>Пн-Пт: 9:00 - 18:00</p>
        <p>Сб-Вс: 10:00 - 16:00</p>
        <p>Email: <a href="mailto:info@example.com">info@restoran.com</a></p>
    </div>
</div>


<footer class="footer">
    <div class="container">
     <p class="footer-p">Вы можете связаться с нами по номеру телефона:
        <div class='number'><a class='num' href='#'>+999-888-76-54</a></div>
     </p>
    </div>
</footer>



<script>
    let currentSlide = 0;
    const slides = document.querySelector('.slides');
    const totalSlides = document.querySelectorAll('.slide').length;

    function showSlide(index) {
        
        if (index < 0) {
            currentSlide = totalSlides - 1; 
        } else if (index >= totalSlides) {
            currentSlide = 0; 
        } else {
            currentSlide = index;
        }

        const offset = -currentSlide * 100;
        slides.style.transform = `translateX(${offset}%)`;
    }

    function nextSlide() {
        showSlide(currentSlide + 1); 
    }

    function prevSlide() {
        showSlide(currentSlide - 1); 
    }

    setInterval(nextSlide, 5000); 
</script>



<script src="app.js"></script>
</body>
</html>
