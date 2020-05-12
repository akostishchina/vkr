<?php
session_start();
?>
<?php if(isset($_SESSION['logged_user'])) : ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ресурс для помощи людям</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="style_me.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous">
</head>
<body>
    <div class="preloader">
        <div class="loader"></div>
    </div>
    <!--<div class="v1"></div>-->
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
                    <a href="message.php">
                        <div class="img_n">
                            <i class="far fa-envelope"></i>
                        </div>
                        <span>Сообщения</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="img_n">
                            <i class="far fa-calendar-alt"></i>
                        </div>
                        <span class="here1">Календарь</span>
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
                    <a href="#">
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
                            <span id="submenuVertical_footer"><p>Напишите нам</p>&rarr;</span>
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
        <section class="cal">

            <h2>Календарь</h2>
            <h4>Воспользуйтесь календарём для планирования своих событий и помогите кому-то воплотить задуманное.</h4>
            <p id="mes" cl></p>
            <div class="cal-field">
                <input type="button" class="animation_plan" value="Сегодня &gt;">
                <div class="today_plan">
                    <p class="today_date"></p>
                    <h4>Планы:</h4>
                    <div class="plan_note" tabindex="0">
                        <p>29.07 отпраздновать др</p>
                        <p>29.07 отпраздновать др</p>
                        <p>29.07 отпраздновать др</p>
                        <p>29.07 отпраздновать др</p>
                        <p>29.07 отпраздновать др</p>
                        <p>29.07 отпраздновать др</p>
                    </div>
                     <?php
                        require_once ('connection.php');
                        $link = mysqli_connect($host, $user, $password, $database, '3308') or die("Ошибка " . mysqli_error($link));
                        mysqli_set_charset($link, "utf8");
                        $result_hero = mysqli_query($link, "SELECT id_role FROM `users` WHERE `user_id`='" . $_SESSION['id'] . "'");
                        $row_hero = mysqli_fetch_array($result_hero);
                        if ($row_hero['id_role'] == 1): ?>
                    <button id="add_plan_btn" class="add_plan_btn">Добавить</button>
                        <?php endif;?>
                </div>
                <img class="photo_calendar" src="img/flower.jpg">
                <div id="calendar">
                    <table id="calendar2" class="calendar">
                        <thead>
                        <tr><td><span class="arrow arrowl">‹</span><td colspan="5"><td><span class="arrow">›</span>
                        <tr><td>Пн<td>Вт<td>Ср<td>Чт<td>Пт<td>Сб<td>Вс
                        <tbody>
                    </table>
                </div>
            </div>
        </section>
        <div class="gray" id="add_plan">
            <form action="" class="add_plans">
                <a href="#" class="exit3 no_plans1"><i class="fas fa-times"></i></a>
                <h3>Новые планы</h3>
                <input type="text" placeholder="Название" required><br>
                <p>Приоритет: <select id="priority" required>
                    <option value="high">Высокий</option>
                    <option value="middle">Средний</option>
                    <option value="low">Низкий</option>
                </select></p><br>
                <input type="text" placeholder="Кому">
                <input type="text" placeholder="Кто"><br>
                <textarea id="description" cols="35" rows="2" placeholder="Краткое описание" autofocus></textarea><br>
                <textarea id="add_info_plan" cols="35" rows="3" placeholder="Дополнительная информация"></textarea><br>
                <input type="reset" class="no_plans2" value="Отмена">
                <input type="submit" id="add_new_plan" value="Сохранить">
            </form>
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
        <script src="swap.js"></script>
        <script src="add_new_plans.js"></script>
        <script src="exit_to_main_page.js"></script>
        <script src="change_data.js"></script>
        <script src="calendar.js"></script>
    </main>
</body>
</html>
<?php endif; ?>