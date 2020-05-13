<?php
session_start();
?>
<?php if(isset($_SESSION['logged_user'])) : ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ресурс для помощи людям</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="style_me.css">
    <link rel="stylesheet" href="style_message.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous">
</head>
<body>
<!--<div class="preloader">
    <div class="loader"></div>
</div>-->
<div class="wrapper">
<section class="sidebar">
    <nav class="menuVertical">
        <ul class="submenuVertical">
            <li>
                <div class="avatar">
                    <i class="fas fa-user-circle"></i>
                </div>
            </li>
            <li>
                <div class="upgrade">
                    <span class="submenuProfile"><?php echo $_SESSION['login']?></span>
                    <button id="up_login"><i class="fas fa-pen"></i></button>
                </div>
            </li>
            <li>
                <a href="profile.php">
                    <div class="img_n">
                        <i class="fas fa-user"></i>
                    </div>
                    <span class="submenuVertical_link">Личный кабинет</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="img_n">
                        <i class="far fa-envelope"></i>
                    </div>
                    <span class="here1">Сообщения</span>
                </a>
            </li>
            <li>
                <a href="me.php">
                    <div class="img_n">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <span>Календарь</span>
                </a>
            </li>
            <li>
                <a href="notes.php">
                    <div class="img_n">
                        <i class="far fa-sticky-note"></i>
                    </div>
                    <span>Статьи</span>
                </a>
            </li>
            <li>
                <a href="education.php">
                    <div class="img_n">
                        <i class="far fa-file-alt"></i>
                    </div>
                    <span>Образование</span>
                </a>
            </li>
            <li>
                <a href="fond.php">
                    <div class="img_n">
                        <i class="far fa-heart"></i>
                    </div>
                    <span>Фонды</span>
                </a>
            </li>
            <!--<li>
                <a href="#1">
                    <div class="img_n">
                        <i class="fas fa-cog"></i>
                    </div>
                    <span class="submenuVertical_link">Настройки</span>
                </a>
            </li>-->
            <li>
                <a class="open-modal1" href="#">
                    <div class="img_n">
                        <i class="fas fa-sign-out-alt"></i>
                    </div>
                    <span class="submenuVertical_link">Выйти</span>
                </a>
            </li>
        </ul>
        <ul >
            <li>
                <div class="add_f">
                    <a href="#" class="sub_foot">
                        <span id="submenuVertical_footer">Напишите нам <p>&rarr;</p></span>
                    </a>
                    <div class="bad">
                        <ul class="nav-menu">
                            <li>
                                <p class="logo1">&copy; 2020 life is great</p>
                            </li>
                            <li>
                                <img src="img/logoza.png" alt="life is great" class="logotype1">
                            </li>
                            <li class="nav-item1">
                                <a href="https://vk.com/id76232994" class="nav-link1" target="_blank" title="Напиши мне в ВК">
                                    <i class="fab fa-vk"></i>
                                </a>
                            </li>
                            <li class="nav-item1">
                                <a href="https://www.instagram.com/sasha_kos98/" class="nav-link1" target="_blank" title="Напиши мне в instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li class="nav-item1">
                                <a href="https://t.me/akostischina" class="nav-link1" target="_blank" title="Напиши мне в telegram">
                                    <i class="fab fa-telegram-plane"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>

        </ul>

    </nav>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</section>
    <div id="color1" class="modal" tabindex="0" role="dialog" aria-labelled-by="modaltitle">
        <div class="c_l_p">
            <button class="exit2" id="close_change_data"><i class="fas fa-times"></i></button>
            <form action="update_data.php" method="POST">
                <h4 class="change-head">Редактирование данных</h4>
                <?php
                if (isset($_SESSION['error_new_data'])) {
                    echo '<div class="message"><p class="msg">' . $_SESSION['error_new_data'] . '</p></div>';
                };
                unset($_SESSION['error_new_data']);
                ?>
                <div class="reg-data">
                    <input type="text" placeholder="Логин" name="new_login" value="<?php echo $_SESSION['login']?>">
                </div>
                <div class="reg-data">
                    <input type="email" placeholder="Почта" name="new_email" value="<?php echo $_SESSION['email']?>">
                </div>
                <a href="#" class="change_password">Вы хотите изменить пароль?</a>
                <div id="new_password" class="new_password">
                    <div class="reg-data">
                        <input type="password" name="old_password" placeholder="Старый пароль">
                    </div>
                    <div class="reg-data">
                        <input type="password" name="new_password" placeholder="Новый пароль">
                    </div>
                    <div class="reg-data">
                        <input type="password" name="again_new_password" placeholder="Повторение нового пароля">
                    </div>
                </div>
                <div class="reg-btn">
                    <input type="submit" name="submit" value="Сохранить изменения" id="save_change_data">
                </div>
            </form>
        </div>
    </div>
<main class="prof_reg">
    <section id="head_omg">
        <ul class="head_menu">
            <li><p class="logo2">Life Is Great</p></li>
            <li><p class="logo2_dop">- это ресурс для людей<br>с ограниченными возможностями</p></li>
            <li class="a_u"><a href="about_us.php">О Нас</a></li>
            <li >
                <button class="open-modal">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </li>
        </ul>
    </section>
    <section class="dialog_people">
        <h2>Сообщения</h2>
        <h4>Здесь вы можете отправить сообщение любому человеку (неважно, какая у него роль). Приятного общения!</h4>
        <div class="dialogs">
            <h3>Выберите диалог:</h3>
            <form action="">
                <span class="icon-s"><i class="fa fa-search"></i></span>
                <input type="search" placeholder="Поиск" autocomplete="off">
            </form>

            <div class="dialogs_scr">



                <div class="m">
                    <img src="img/mark.jpg">
                    <div class="info">
                        <p class="name">Фамилия Имя</p>
                        <p>cfgvhbjnkm cfgvhbn</p>
                    </div>
                    <p class="n_m">2</p>
                </div>
            <!--<div class="m">
                <img src="img/mark.jpg">
                <div class="info">
                    <p class="name">Фамилия Имя</p>
                    <p>cfgvhbjnkm cfgvhbn</p>
                </div>
                <p class="n_m">2</p>
            </div>
            <div class="m">
                <img src="img/mark.jpg">
                <div class="info">
                    <p class="name">Фамилия Имя</p>
                    <p>cfgvhbjnkm cfgvhbn</p>
                </div>
                <p class="n_m">2</p>
            </div>
            <div class="m">
                <img src="img/mark.jpg">
                <div class="info">
                    <p class="name">Фамилия Имя</p>
                    <p>cfgvhbjnkm cfgvhbn</p>
                </div>
                <p class="n_m">2</p>
            </div>-->



            </div>
        </div>
        <div class="message_sms">

            <p class="cur_name">Фамилия Имя</p>
            <div class="field">
                <?php require_once('show_messages.php');?>
                <?php $dialog = show();?>
                <!--<div class="two_sms">
                    <div class="to_me_m">
                        <img src="img/mark.jpg">
                        <div class="to_me">
                            <p>ehf</p>
                        </div>
                    </div>
                    <div class="to_smn_m">
                    <div class="to_smn">
                        <p>Наконец-то работает</p>
                    </div>
                    </div>
                </div>-->

            </div>

            <div class="send">
                <form action="send_message.php" method="POST">
                    <span id="smile"><i class="far fa-smile"></i></span>
                    <input type="text" name="message_text" id="message-text" placeholder="Введите сообщение">
                    <div class="s_i">
                        <input type="submit" id="send" value=""><!--<i class="fab fa-telegram-plane"></i>-->
                    </div>
                </form>
            </div>
        </div>
    </section>


</main>
</div>
<div class="modal" id="modal" tabindex="0" role="dialog" aria-labelled-by="modaltitle">
    <div class="modal__content">
        <form action="logout.php" method="POST">
            <div class="info_save">
                <h2 class="save-head">Вы уверены?</h2>
                <h4>Вы хотите покинуть страницу?</h4>
            </div>
            <div class="btns">
                <input type="submit" class="positive" id="exit_to_main_page" value="Выйти">
                <input type="button" class="round no_exit1" value="Отмена">
            </div>
            <button class="ex1 no_exit"><i class="fas fa-times"></i></button>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="preloader.js"></script>
<script src="exit_to_main_page.js"></script>
<script src="change_data.js"></script>
</body>
</html>
<?php endif; ?>