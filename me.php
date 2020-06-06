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
<!--<div class="preloader">
        <div class="loader"></div>
    </div>-->


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
                    <a href="message.php?mes_id=0">
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
            <?php
            if (isset($_SESSION['calendar'])) {
                echo '<div class="cal_error"><p class="msg_cal">' . $_SESSION['calendar'] . '</p></div>';
            };
            unset($_SESSION['calendar']);
            ?>
            <h4>Воспользуйтесь календарём для планирования своих событий и помогите кому-то воплотить задуманное.</h4>
            <p id="mes" cl></p>
            <div class="cal-field">
                <input type="button" id="today_btn" class="animation_plan" value="Сегодня &gt;">
                <div class="today_plan">
                    <p class="today_date"></p>

                    <h4>Планы:</h4>
                    <div class="plan_note" tabindex="0">
                        <?php require_once ('show_plans.php');?>
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
                <?php
                require_once ('connection.php');

                $link = mysqli_connect('localhost', 'root', '', 'myvkr', '3308')
                or die("Ошибка подключения к бд" . mysqli_error($link));
                mysqli_set_charset($link, "utf8");
                if (isset($_GET['plan_id'])) {
                    $plan = $_GET['plan_id'];
                    $query = "SELECT * FROM `calendar` WHERE `id_help` = '" . $plan . "'";
                    $sql_result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
                    $of = mysqli_fetch_array($sql_result);

                    if ($row_hero['id_role'] == 1) {
                        echo '
                            <div class="photo_calendar cur_plan">
                            <form method="post" action="show_current_plan.php?action=edit&id=' . $_GET['plan_id'] . '">
                            <p>Название: 
                            <input type="text" name="new_title_cal" value="' . $of['title_cal'] . '" required></p><br>
                            
                            <p>Кто поможет: ';
                        if ($of['helper_id'] == '0') {
                            echo '<input type="text" name="new_who" value="" disabled></p><br>';
                        } else {
                            $query_log_helper = mysqli_query($link, "SELECT `login` FROM `users` WHERE `user_id` = '" . $of['helper_id'] . "'");
                            $result_log = mysqli_fetch_array($query_log_helper);
                            echo '<input type="text" name="new_title_cal" value="' . $result_log['login'] . '" disabled></p><br>';
                        }

                        echo '<p> Приоритет: 
                            <select id="pr" name="new_priority">';
                        switch ($of['priority']) {
                            case  1:
                                echo '<option value="1" selected>Высокий</option><option value="2">Средний</option> <option value="3">Низкий</option>';
                                break;
                            case  2:
                                echo '<option value="1">Высокий</option><option value="2" selected>Средний</option> <option value="3">Низкий</option>';
                                break;
                            case  3:
                                echo '<option value="1">Высокий</option><option value="2">Средний</option> <option value="3" selected>Низкий</option>';
                                break;
                        }
                        echo '</select></p><br>
                            <input type="date" name="new_date_cal" required min="2020-05-20" value="' . $of['date'] . '"><br>
                            <p>Краткое описание: 
                            <input type="text" name="new_info" value="' . $of['info'] . '" required></p><br>

                            <p>Дополнительная информация: <input type="text" name="new_more_info" value="' . $of['more_info'] . '"></p><br>
                            
							<button type="input" name="redaction_plan" class="red_plan">Редактировать</button></form>
                            <button name="delete_plan" id="del_help" class="del_plan">Удалить</button>
                           </div>';
                    }else {
                        echo '
                            <div class="photo_calendar cur_plan">
                            <form method="post" action="show_current_plan.php?action=edit&id=' . $_GET['plan_id'] . '&uid=' . $_SESSION['id'] . '">
                            <p>Название: 
                            <input type="text" name="new_title_cal" value="' . $of['title_cal'] . '" disabled></p><br>
                            
                            <p>Кто поможет: ';
                        if ($of['helper_id'] == '0') {
                            echo '<input type="text" name="new_who" value=""></p><br>';
                        } else {
                            $query_log_helper = mysqli_query($link, "SELECT `login` FROM `users` WHERE `user_id` = '" . $of['helper_id'] . "'");
                            $result_log = mysqli_fetch_array($query_log_helper);
                            if ($of['helper_id'] == $_SESSION['id']) {
                                echo '<input type="text" name="new_title_cal" value="' . $result_log['login'] . '"></p><br>';
                            }else {
                                echo '<input type="text" name="new_title_cal" value="' . $result_log['login'] . '" disabled></p><br>';
                            }
                        }

                        echo '<p> Приоритет: 
                            <select id="pr" name="new_priority" disabled>';
                        switch ($of['priority']) {
                            case  1:
                                echo '<option value="1" selected>Высокий</option><option value="2">Средний</option> <option value="3">Низкий</option>';
                                break;
                            case  2:
                                echo '<option value="1">Высокий</option><option value="2" selected>Средний</option> <option value="3">Низкий</option>';
                                break;
                            case  3:
                                echo '<option value="1">Высокий</option><option value="2">Средний</option> <option value="3" selected>Низкий</option>';
                                break;
                        }
                        echo '</select></p><br>
                            <input type="date" name="new_date_cal" required min="2020-05-20" value="' . $of['date'] . '" disabled><br>
                            <p>Краткое описание: 
                            <input type="text" name="new_info" value="' . $of['info'] . '" disabled></p><br>

                            <p>Дополнительная информация: 
                            <input type="text" name="new_more_info" value="' . $of['more_info'] . '" disabled></p><br>
                            
							<button type="input" name="redaction_plan" class="red_plan">Редактировать</button></form>
                           </div>';
                    }
                }
                else {
                    echo '<img class="photo_calendar" src="img/flower.jpg" alt="Просто фото для украшения">';
                }
                ?>

                <div class="calendar">
					<div id="calendar_div">
                    <?php
                    if ($row_hero['id_role'] == 1) {
                        include_once('functions1.php');
                        echo getCalender1();
                    }else {
                        include_once('functions.php');
                        echo getCalender();
                    } ?>
					</div>
                </div>
                <!--<div id="calendar">
                    <table id="calendar2" class="calendar">
                        <thead>
                        <tr><td><span class="arrow arrowl">‹</span><td colspan="5"><td><span class="arrow">›</span>
                        <tr><td>Пн<td>Вт<td>Ср<td>Чт<td>Пт<td>Сб<td>Вс
                        <tbody>
                    </table>

                </div>-->

                <!--<script type="text/javascript">
                    function Calendar2(id, year, month) {
                        var Dlast = new Date(year,month+1,0).getDate(),
                            D = new Date(year,month,Dlast),
                            DNlast = new Date(D.getFullYear(),D.getMonth(),Dlast).getDay(),
                            DNfirst = new Date(D.getFullYear(),D.getMonth(),1).getDay(),
                            calendar = '<tr>',
                            month=["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"];

                        today();

                        if (DNfirst != 0) {
                            for(var  i = 1; i < DNfirst; i++) calendar += '<td>';
                        }
                        else {
                            for(var  i = 0; i < 6; i++) calendar += '<td>';
                        }

                        for(var  i = 1; i <= Dlast; i++) {
                            if (i == new Date().getDate() && D.getFullYear() == new Date().getFullYear() && D.getMonth() == new Date().getMonth()) {
                                calendar += '<td class="today" tabindex="0">' + i;
                            }
                            else {
                                calendar += '<td class="all_day" tabindex="0">' + i;
                            }
                            if (new Date(D.getFullYear(),D.getMonth(),i).getDay() == 0) {
                                calendar += '<tr>';
                            }
                        }

                        for(var  i = DNlast; i < 7; i++) calendar += '<td>&nbsp;';
                        document.querySelector('#'+id+' tbody').innerHTML = calendar;
                        document.querySelector('#'+id+' thead td:nth-child(2)').innerHTML = month[D.getMonth()] +' '+ D.getFullYear();
                        document.querySelector('#'+id+' thead td:nth-child(2)').dataset.month = D.getMonth();
                        document.querySelector('#'+id+' thead td:nth-child(2)').dataset.year = D.getFullYear();
                        if (document.querySelectorAll('#'+id+' tbody tr').length < 6) {  // чтобы при перелистывании месяцев не "подпрыгивала" вся страница, добавляется ряд пустых клеток. Итог: всегда 6 строк для цифр
                            document.querySelector('#'+id+' tbody').innerHTML += '<tr><td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;';
                        }
                        //выводим дату = сегодня

                    }
                    Calendar2("calendar2", new Date().getFullYear(), new Date().getMonth());
                    // переключатель минус месяц
                    document.querySelector('#calendar2 thead tr:nth-child(1) td:nth-child(1)').onclick = function() {
                        Calendar2("calendar2", document.querySelector('#calendar2 thead td:nth-child(2)').dataset.year, parseFloat(document.querySelector('#calendar2 thead td:nth-child(2)').dataset.month)-1);
                    }
                    // переключатель плюс месяц
                    document.querySelector('#calendar2 thead tr:nth-child(1) td:nth-child(3)').onclick = function() {
                        Calendar2("calendar2", document.querySelector('#calendar2 thead td:nth-child(2)').dataset.year, parseFloat(document.querySelector('#calendar2 thead td:nth-child(2)').dataset.month)+1);
                    }-->
                <script>
                    /*function Calendar2(id, year, month) {
                    var Dlast = new Date(year,month+1,0).getDate(),
                        D = new Date(year,month,Dlast),
                        month=["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"];
                    document.querySelector('#'+id).innerHTML = month[D.getMonth()] +' '+ D.getFullYear();
                    document.querySelector('#'+id).dataset.month = D.getMonth();
                    document.querySelector('#'+id).dataset.year = D.getFullYear();}
                    Calendar2("calendar2", new Date().getFullYear(), new Date().getMonth());
                    // переключатель минус месяц
                    document.querySelector('.month_and_arrow a:nth-child(1)').onclick = function() {
                        Calendar2("calendar2", document.querySelector('#calendar2').dataset.year, parseFloat(document.querySelector('#calendar2').dataset.month)-1);
                    };
                    // переключатель плюс месяц
                    document.querySelector('.month_and_arrow a:nth-child(2)').onclick = function() {
                        Calendar2("calendar2", document.querySelector('#calendar2').dataset.year, parseFloat(document.querySelector('#calendar2').dataset.month) + 1);
                    };*/
                    today();
                    function today() {
                        var d = new Date();
                        var day=new Array("Воскресенье","Понедельник","Вторник",
                            "Среда","Четверг","Пятница","Суббота");
                        var month=new Array("января","февраля","марта","апреля","мая","июня",
                            "июля","августа","сентября","октября","ноября","декабря");
                        var TODAY = day[d.getDay()] +", " +d.getDate()+ " " + month[d.getMonth()];
                        document.querySelector('.today_date').innerHTML = TODAY;
                    }
                </script>
                <div id="event_list" class="none more_info_day">

                </div>
                <div id="note" class="none more_info_day"></div>
            </div>

        </section>
        <div class="gray" id="add_plan">
            <form action="add_calendar.php" class="add_plans" method="post">
                <a href="#" class="exit3 no_plans1"><i class="fas fa-times"></i></a>
                <h3>Новые планы</h3>
                <input type="text" placeholder="Название" name="title_cal" required><br>
                <p>Приоритет: <select id="priority" name="priority" required>
                    <option value="1">Высокий</option>
                    <option value="2">Средний</option>
                    <option value="3">Низкий</option>
                </select></p>
                <input type="date" name="date_cal" required min="2020-05-20" value="2020-05-20"><br>
                <input type="text" placeholder="Кому" name="to_me" value="<?php echo $_SESSION['login']?>">
                <input type="text" placeholder="Кто" name="who"><br>
                <textarea id="description" cols="35" name="min_description" rows="2" placeholder="Краткое описание" autofocus></textarea><br>
                <textarea id="add_info_plan" cols="35" name="more_description" rows="3" placeholder="Дополнительная информация"></textarea><br>
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
        <div class="modal" tabindex="0" role="dialog" aria-labelled-by="modaltitle" id="help_delete">
            <div class="modal__content">
                <div class="info_save">
                    <h2 class="save-head">Вы уверены?</h2>
                    <h4>При нажатии на эту кнопку просьба будет удалена.</h4>
                </div>
                <div class="btns">
                    <a class="positive" href="show_current_plan.php?action=delete&id=<?=$_GET['plan_id']?>">Да</a>
                    <input type="button" class="round no_delete1" value="Отмена">
                </div>
                <button class="ex1 no_delete2"><i class="fas fa-times"></i></button>
            </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="preloader.js"></script>
        <script src="swap.js"></script>
        <script src="add_new_plans.js"></script>
        <script src="del_help.js"></script>
        <script src="current_plan.js"></script>
        <script src="exit_to_main_page.js"></script>
        <script src="change_data.js"></script>
        <script src="calendar.js"></script>
    </main>
</body>
</html>
<?php endif; ?>