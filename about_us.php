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
        <link rel="stylesheet" href="style_a_u.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous">
    </head>
    <body>
    <div class="preloader">
        <div class="loader"></div>
    </div>
        <header>
            <div class="header">
                <div class="nav">
                    <div class="header__burger">
                        <span></span>
                    </div>
                    <a class="logo logo1">Life Is Great</a>
                    <nav class="header__menu">
                        <ul class="menu">
                            <li class="menu_item">
                                <a href="main_page.php">Главная</a>
                                <span class="bg-text">Главная</span>
                            </li>
						    <li class="here menu_item">О Нас</li>
                        </ul>
                    </nav>
                    <button id="join" type="submit" class="signIn">Вход</button>
                </div>
            </div>
			<div class="a_u">
				<h1>О Нас</h1>
				    <p>Ресурс Life Is Great - это возможность изменить жизнь к лучшему.</p>
			</div>
            <div class="sign-block">
                <div class="sign">
                    <form action="auth_a_u.php" method="POST">
                        <a href="#" class="exit1"><i class="fas fa-times"></i></a>
                        <h4 class="sign-head">Вход</h4>
                        <?php
                        if (isset($_SESSION['message_auth_a_u'])) {
                            echo '<div class="message"><p class="msg">' . $_SESSION['message_auth_a_u'] . '</p></div>';
                        };
                        unset($_SESSION['message_auth_a_u']);
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
        </header>
        <main>
            <section class="hi">
				<div class="say_hi">
					<div class="center">
						<h3>Здравствуй, дорогой пользователь!</h3>
                        <img class="zigzag" src="img/Zigzag-PNG-Image-Background.png" alt="">
						<p id="c1">Сейчас я расскажу о том, как создавался информационный ресурс "Life Is Great",
						что мною движило и как мне пришла в голову эта идея. Но обо всём по порядку:)</p>	
					</div>

					<div class="left">
						<div class="idea">
							<p> Этот проект был создан, как выпускная квалификационная работа (в наших кругах зовётся ВКР)
							студентки Санкт-Петербургского Государственного Электротехнического 
							университета «ЛЭТИ» им.Ульянова (Ленина) Костищиной Александры (т.е. мной).</p>	
						</div>
						<div class="photo">
							<img src="img/me.jpg" alt="">
						</div>
					</div>
					<div class="center">
                        <img class="zigzag" src="img/Zigzag-PNG-Image-Background.png" alt="">
						<div class="idea">
							<p>Я считаю, что главной целью всей нашей карьеры, профессионального образования и
							работы является создание благ для общества. Хоть нам иногда стыдно в этом признаться,
							но не все слои нашего социума получают достаточно благ для нормального существования
							в современном обществе. Для того, чтобы напомнить об этом и улучшить качество их жизни
							и был создан этот ресурс. </p>
						</div>
                        <img class="zigzag" src="img/Zigzag-PNG-Image-Background.png" alt="">
					</div>
					<div class="left">
						<div class="idea">
							<p>Здесь ты, уважаемый пользователь, можешь изменить чью-то жизнь, 
							помочь кому-то, поделиться опытом. Это безумно важно, а для кого-то жизненно необходимо.
							Я верю, что эта идея, этот сайт откликнется в ваших сердцах и умах, и мы вместе сделаем мир
							лучше!</p>
						</div>
						<div class="photo">
							<img src="img/omg.jpg" alt="">
						</div>
						
					</div>
					<div class="center" id="c2">
						<p>С огромной любовью,<br>
						команда “Life Is Great”.</p>
					</div>
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
        <a class="back_to_top">
            <span id="toTopHover"></span>
        </a>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="preloader.js"></script>
        <script src="burger-menu.js"></script>
        <script src="entry.js"></script>
        <script src='script.js'></script>


    </body>
</html>