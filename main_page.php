<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>Ресурс для помощи людям</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel="shortcut icon" href="img/logo.png" type="image/png">
        <link rel="stylesheet" href="stylesheet.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous">
    </head>
    <body>
    <div class="preloader">
        <div class="loader"></div>
    </div>
        <header class="header">
            <div class="nav1">
                <div class="header__burger">
                    <span></span>
                </div>
                <a class="logo">Life Is Great</a>
                <nav class="header__menu">
                    <ul class="menu">
                        <li class="here menu_item">Главная</li>
                        <li class="menu_item">
                            <a href="about_us.php">О Нас</a>
                            <span class="bg-text">О нас</span>
                        </li>
                        <li class="menu_item">
                            <a href="#rev">Отзывы</a>
                            <span class="bg-text">Отзывы</span>
                        </li>
                        <li class="menu_item">
                            <a href="#o_hero">Наши Герои</a>
                            <span class="bg-text">Наши герои</span>
                        </li>
                    </ul>
                </nav>
                    <div class="col12">
                        <button id="join" type="submit" class="signIn">Вход</button>
                    </div>
            </div>
        </header>
			<div class="sign-block">
                <div class="sign">
                    <form action="auth.php" method="POST">
                        <a href="#" class="exit1"><i class="fas fa-times"></i></a>
                        <h4 class="sign-head">Вход</h4>
                        <?php
                        if (isset($_SESSION['message_auth'])) {
                            echo '<div class="message"><p class="msg">' . $_SESSION['message_auth'] . '</p></div>';
                        };
                        unset($_SESSION['message_auth']);
                        ?>
                        <div class="input-data">
                            <input type="text" placeholder="Введите логин" name="login" required>
                        </div>
                        <div class="input-data">
                            <input type="password" placeholder="Введите пароль" name="password" required>
                        </div>
                        <div class="input-btn">
                            <input type="submit" name="submit" value="Войти">
                        </div>
                    </form>
                    <p class="notReg">Ещё не зарегистрированы?</p>

                    <div class="input-btn notReg-btn">
                        <a class="btn-not-reg" id="notReg" href='main_page.php#reg'">Зарегистрироваться</a>
                    </div>

                </div>
			</div>
        <main>
            <section class="start">
                <div class="start-img">
                    <blockquote class="bq1">
                        <p>Ничего не делается само собой, без усилий и воли, без жертв и труда. Воля людская, воля одного твердого человека страшно велика."</p>
                        <cite>А.И.Герцен</cite>
                    </blockquote>
                </div>
            </section>
            <section class="character">
                <h2 class="char" id="reg">Выбери персонажа, который тебе близок</h2>
                <?php
                if (isset($_SESSION['message'])) {
                    echo '<div class="message"><p class="msg">' . $_SESSION['message'] . '</p></div>';
                };
                unset($_SESSION['message']);
                ?>
                <div class="heroes">
                    <div class="hero">
                        <img src="img/iron.png" alt="">
                        <div class="hero-container">
                            <h3>Железный человек</h3>
                            <p>Твоя сила и воля не знают границ. Ты можешь помочь другим или тебе самому нужна помощь</p>
                            <button id="hero" type="submit" class="registr me"onclick="hero_click()"<?php $pls = 1; ?>>Это я!</button>
                        </div>
                    </div>
                    <div class="hero">
                        <img src="img/friend.png" alt="">
                        <div class="hero-container">
                            <h3>Верный друг</h3>
                            <p>Твоё сердце настолько доброе и большое, что ты готов сорваться с места в любую минуту ради ближнего</p>
                            <button id="volunteer" type="submit" class="registr me"onclick="volunteer_click()"<?php $pls = 2; ?>>Это я!</button>
                        </div>
                    </div>    
                    <div class="hero">
                        <img src="img/doctor.png" alt="">
                        <div class="hero-container">
                            <h3>Добрый доктор</h3>
                            <p>Твои знания уже не раз спасали чью-то судьбу, но ты понимаешь, что хочешь помочь ещё многим людям</p>
                            <button id="doctor" type="submit" class="registr me" onclick="doctor_click()"<?php $pls = 3; ?>>Это я!</button>
                        </div>
                    </div>

                    <div class="reg_form" id="reg_block">
                     <form class="reg-block" method="POST" action="registr.php">
                        <div class="reg">
                            <a href="#" class="exit2"><i class="fas fa-times"></i></a>
                            <h4 class="reg-head">Регистрация</h4>

                            <div class="reg-data right">
                                <input type="text" name="login" placeholder="Логин" required class="con-tooltip ">
                                <span id="valid_login_message" class="message_error"></span>
                                <div class="tooltip">
                                    <p>Логин должен состоять из букв a-z и цифр 0-9</p>
                                </div>
                            </div>
                            <div class="reg-data">
                                <input type="email" name="email" placeholder="Почта" required>
                                <span id="valid_email_message" class="message_error"></span>
                            </div>
                            <div class="reg-data right1">
                                <input type="password" name="password" placeholder="Пароль" required class="con-tooltip">
                                <span id="valid_password_message" class="message_error"></span>
                                <div class="tooltip">
                                    <p>Пароль должен быть не менее 6 символов</p>
                                </div>
                            </div>
                            <div class="reg-data">
                                <input type="password" name="password_again" placeholder="Повторение пароля" required>
                            </div>

                            <input type="hidden" id="id_role" name="id_role" value="<?=$pls?>">
                            <div class="reg-btn">
                                <input type="submit" name="submit" value="Зарегистрироваться">
                            </div>
                        </div>

                    </form>
                    </div>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

                <div class="review">
                    <h2 id="rev">Отзывы</h2>
                    <div class="container con1">
                        <img src="img/photo.png" alt="">
                        <h3>Иванов Иван</h3><hr>
                        <p>"Замечательная платформа для общения и нахождения помощи.<br>Я бы хотел, чтобы в нашей стране продолжала развиваться идея о том, что мы все равны."</p>
                    </div>
                    <div class="container con2">
                        <img src="img/woman.jpg" alt="">
                        <h3>Поварова Мария</h3><hr>
                        <p>"Огромное спасибо за столь чудесный проект! Здесь собрано всё, что нужно."</p>
                    </div>
                    <div class="container con1">
                        <img src="img/doc.png" alt="">
                        <h3>Котова Анна</h3><hr>
                        <p>"Я давно поняла, что помогать людям - это моё призвание. Здесь всё честно и открыто."</p>
                    </div>
                </div>
            </section>
            <section>
                <h2 id="o_hero">Герои не носят плащи</h2>
                <div class="slider">
                    <div class="slider__wrapper">
                        <div class="slider__item">
                            <div class="hero hero3">
                                <img src="img/mares.jpg" alt="">
                                <div class="hero-container">
                                    <h3>Алексей Маресьев</h3>
                                    <p>Герой Советского Союза, легендарный лётчик. В 1942 году его самолёт подбили, а сам он был тяжело ранен. В госпитале ему ампутировали обе ноги, но он снова сел за штурвал и даже начал танцевать.</p>
                                </div>
                            </div>
                        </div>
                        <div class="slider__item">
                            <div class="hero hero1">
                                <img src="img/sammy.jpg" alt="">
                                <div class="hero-container">
                                    <h3>Сэмми Джабраиль</h3>
                                    <p>В 2017 году попала в автомобильную аварию, после которой ей ампутировали ногу. Сейчас у неё цель - попытаться изменить отношение к людям с ограниченными возможностями.</p>
                                </div>
                            </div>
                        </div>
                        <div class="slider__item">
                            <div class="hero hero2">
                                <img src="img/sega.jpg" alt="">
                                <div class="hero-container">
                                    <h3>Сергей Кутовой</h3>
                                    <p>За месяц до школьного выпускного он потерял ногу в автомобильной аварии. Оптимизм, воля к жизни, мечты о том, чтобы встать на протез, замечательная семья - вот, чем он живёт.</p>
                                </div>
                            </div>
                        </div>
                        <div class="slider__item">
                            <div class="hero hero3">
                                <img src="img/viki.jpg" alt="">
                                <div class="hero-container">
                                    <h3>Виктория Модеста</h3>
                                    <p>Из-за травм, полученных при рождении, ей ампутировали ногу ниже колена. Сейчас она поёт и позирует для журналов, тем самым разрушая общие представления о стандартах красоты.</p>
                                </div>
                            </div>
                        </div>
                        <div class="slider__item">
                            <div class="hero hero1">
                                <img src="img/mark.jpg" alt="">
                                <div class="hero-container">
                                    <h3>Марк Инглис</h3>
                                    <p>Новозеландец в 2006-м году покорил Эверест, за двадцать лет до этого лишившись обеих ног. В одной из предыдущих экспедиций он отморозил себе ноги, но мечтать о покорении Эвереста не переставал. </p>
                                </div>
                            </div>
                        </div>
                        <div class="slider__item">
                            <div class="hero hero2">
                                <img src="img/nik.jpg" alt="">
                                <div class="hero-container">
                                    <h3>Ник Вуйчич</h3>
                                    <p>Ник родился с синдромом Тетра-Амелия приводящим к отсутствию всех конечностей. Сейчас он один из самых известных и популярных мотивационных спикеров в мире, имеет жену и детей.</p>
                                </div>
                            </div>
                        </div>
                        <div class="slider__item">
                            <div class="hero hero3">
                                <img src="img/hawking.png" alt="">
                                <div class="hero-container">
                                    <h3>Стивен Хокинг</h3>
                                    <p>Известный учёный родился здоровым, но в ранней молодости врачи обнаружили у него болезнь Шарко. Заболевание быстро прогрессировало, и вскоре почти все мышцы были парализованы.</p>
                                </div>
                            </div>
                        </div>
                        <div class="slider__item">
                            <div class="hero hero1">
                                <img src="img/ev_sm.jpg" alt="">
                                <div class="hero-container">
                                    <h3>Евгений Смирнов</h3>
                                    <p>В 2012 году его сбила машина, из-за халатности врачей в больнице началась гангрена, ему ампутировали ногу. После выписки начал заниматься греблей, но его душой завладели танцы.</p>
                                </div>
                            </div>
                        </div>
                        <div class="slider__item">
                            <div class="hero hero2">
                                <img src="img/vera.jpg" alt="">
                                <div class="hero-container">
                                    <h3>Вера Омельчук</h3>
                                    <p>Родилась без рук, одна нога короче другой, но умеет делать всё сама. Вера - дипломированный визажист, увлекается вышиванием, воспитывает детей и радуется жизни.</p>
                                </div>
                            </div>
                        </div>    
                    </div>
                    <a class="slider__control slider__control_left" href="#" role="button"></a>
                    <a class="slider__control slider__control_right slider__control_show" href="#" role="button"></a>
                </div>
            </section>
        </main>
        <footer>
            <div>
                <ul class="nav-menu">
                    <li>
                        <p class="logo">&copy; 2020 life is great</p>
                    </li>
		
                    <li class="logo_logo">
                        <img src="img/logoza.ru.png" alt="life is great" class="logotype">
                    </li>
                    <div class="adapt_foot">
                        <li class="nav-item" tabindex="0">
                            <a href="https://vk.com/id76232994" class="nav-link" target="_blank" title="Напиши мне в ВК">
                                <i class="fab fa-vk"></i>
                            </a>
                        </li>
                        <li class="nav-item" tabindex="0">
                            <a href="https://www.instagram.com/sasha_kos98/" class="nav-link" target="_blank" title="Напиши мне в instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li class="nav-item" tabindex="0">
                            <a href="https://t.me/akostischina" class="nav-link" target="_blank" title="Напиши мне в telegram">
                                <i class="fab fa-telegram-plane"></i>
                            </a>
                        </li>
                    </div>
                </ul>
            </div>
        </footer>
        <a class="back_to_top" tabindex="0">
            <span id="toTopHover"></span>
        </a>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="preloader.js"></script>
        <script src="burger-menu.js"></script>
        <script src="entry.js"></script>
        <script src="registration.js"></script>
        <script src="script_slider.js"></script>
        <script src='script.js'></script>
    </body>
</html>