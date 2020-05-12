<?php
session_start();
?>
<?php if(isset($_SESSION['logged_user'])) : ?>
    <?php
    require_once ('connection.php');

    $link = mysqli_connect($host, $user, $password, $database, '3308')
    or die("Ошибка " . mysqli_error($link));
    mysqli_set_charset($link, "utf8");

    $id_human = $_SESSION['id'];
    $mb = mysqli_query($link, "SELECT * FROM `privateinfo` WHERE `user_id`='" . $_SESSION['id'] . "'");
    $row_mb = mysqli_fetch_assoc($mb);
    $_SESSION['surname'] = $row_mb['surname'];
    $_SESSION['name'] = $row_mb['name'];
    $_SESSION['patronymic'] = $row_mb['patronymic'];
    $_SESSION['date'] = $row_mb['birthday'];
    $_SESSION['sex'] = $row_mb['sex'];
    $_SESSION['adress'] = $row_mb['adress'];
    $_SESSION['phone'] = $row_mb['phone'];
    $_SESSION['about'] = $row_mb['about'];

    $_SESSION['avatar'] = $row_mb['avatar'];
    $_SESSION['avatar_name'] = $row_mb['avatar_name'];

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ресурс для помощи людям</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="style_me.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous">
</head>
<body>

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
                <a href="#">
                    <div class="img_n">
                        <i class="fas fa-user"></i>
                    </div>
                    <span class="submenuVertical_link here1">Личный кабинет</span>
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
<?php function checked($var, $value = null) {
    if (is_null($value)) {
        return ($var) ? ' checked' : '';
    }else {
        if (!is_array($var)) {
            $var = explode(',',$var);
        }
        return(in_array($value,$var))?' checked' : '';
    }
}?>
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
                <input type="submit" value="Сохранить изменения" id="save_change_data">
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
    <section class="hi_msg">
        <?php
        if (isset($_SESSION['message'])) {
            echo '<p class="msg">' . $_SESSION['message'] . '</p>';
        };
        unset($_SESSION['message']);
        ?>

    </section>
    <section id="main_info">
        <form action="add_private_info.php" method="POST" name="add_info" id="add_private_info" enctype="multipart/form-data">
            <div class="photo_profile">
                <?php
                $result_img = mysqli_query($link, "SELECT * FROM `privateinfo` WHERE `user_id`='" . $_SESSION['id'] . "'");
                $row_img = mysqli_fetch_array($result_img);
                if($row_img['avatar']) {
                    echo '<img class="ava" src="data:image;base64, '.$row_img['avatar'].'">';
                }
                else {
                    echo '<img class="ava" src="img/ava.png" alt="Ваше фото">';
                }

                ?>
                <!--<img class="ava" src="img/ava.png" alt="Ваше фото">-->
                <button id="add_photo"><i class="fas fa-plus-circle"></i></button>
            </div>
            <fieldset>
                <legend> Личные данные </legend>
                <?php
                if (isset($_SESSION['error_add_info'])) {
                    echo '<div class="message_pr"><p class="msg1">' . $_SESSION['error_add_info'] . '</p></div>';
                };
                unset($_SESSION['error_add_info']);
                ?>
                <div class="reg-inp">
                    <label for="surname">Введите фамилию: <span class="always">*</span></label>
                    <input id="surname" type="text" placeholder="Иванов" required maxlength="15" autocomplete="on" name="surname" value="<?php echo $_SESSION['surname']?>"><br>

                    <label for="name_user">Введите Имя: <span class="always">*</span></label>
                    <input id="name_user" type="text" placeholder="Иван" maxlength="15" autocomplete="on" name="name_user"required value="<?php echo $_SESSION['name']?>"><br>

                    <label for="grand_name">Введите Отчество: </label>
                    <input id="grand_name" type="text" placeholder="Иванович" maxlength="15" autocomplete="on" required name="grand_name"value="<?php echo $_SESSION['patronymic']?>"><br>
                    <div class="sex">
                        <span class="always">*</span>
                        <input id="man" type="radio" name="sex" value="М" required <?php if ($_SESSION['sex'] == 'М') {echo 'checked';} ?>>
                        <label for="man">М</label>
                        <input id="woman" type="radio" name="sex" value="Ж" required <?php if ($_SESSION['sex'] == 'Ж') {echo 'checked';} ?>>
                        <label for="woman">Ж</label><br>
                    </div>

                    <label for="data">Дата рождения: </label>
                    <input id="data" type="date" name="data" value="<?php echo $_SESSION['date']?>"><br>

                    <label for="tel">Номер телефона: <span class="always">*</span></label>
                    <input id="tel" type="tel" required pattern="[0-9]{1}-[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" placeholder="8-999-999-99-99" maxlength="15" name="tel" value="<?php echo $_SESSION['phone']?>"><br>

                    <label for="address">Введите адрес: </label>
                    <input id="address" type="text" placeholder="г.Санкт-Петербург, ул.Корабельная, д.6"  name="address" value="<?php echo $_SESSION['adress']?>"><br>

                    <label for="info">Расскажите немного о себе: </label><br>
                    <textarea id="info" cols="5" rows="2" name="about_me"><?php echo $_SESSION['about']?></textarea><br>

                    <input type="file" name="my_image"><br>

                    <input type="reset" value="Отмена">
                    <input type="submit" id="save_dialog" value="Сохранить" name="submit">
                </div>
            </fieldset>
        </form>

    </section>

    <div class="modal" tabindex="0" role="dialog" aria-labelled-by="modaltitle" id="modal_save">
        <div class="modal__content">
            <div class="info_save">
                <h2 class="save-head">Вы уверены?</h2>
                <h4>При нажатии на эту кнопку все изменения будут сохранены.</h4>
            </div>
            <div class="btns">
                    <input type="button" class="positive" id="positive_btn" value="Сохранить">
                    <input type="button" class="round exit4" value="Отмена">
            </div>
            <button class="ex1 exit3"><i class="fas fa-times"></i></button>
        </div>
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
    <div class="modal" id="pop-up-layer" tabindex="0" role="dialog" aria-labelled-by="modaltitle">
        <div class="modal__content pop-up">
            <div class="info_save">
                <img src="img/check.png">
                <h4>Все изменения сохранены</h4>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="pop-up.js"></script>
    <script src="preloader.js"></script>
    <script src="exit_to_main_page.js"></script>
    <script src="change_data.js"></script>
</main>

</body>
</html>
<?php endif; ?>
