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
    <link rel="stylesheet" href="style_fond.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous">
</head>
<body>
<div class="preloader">
    <div class="loader"></div>
</div>
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
                <a href="#">
                    <div class="img_n">
                        <i class="far fa-heart"></i>
                    </div>
                    <span class="here1">Фонды</span>
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
    <section class="fonds">
        <h3>Фильтр</h3>
        <div id="list_fond_1">
            <div class="fond">
                <h2>Фонд "Точка Опоры"</h2>
                    <img src="img/fond1.png">
                    <div class="pl">
                    <p>Фонд был зарегистрирован в 2010 году. Его учредители были обеспокоены печальной статистикой - спортсмены из Санкт-Петербурга всё реже попадали в национальную сборную.
                        Очевидно, что причина была не в отсутствии талантливых спортсменов и достойных тренеров,
                        а в острой нехватке средств на подготовку и участие в дорогостоящих международных рейтинговых соревнованиях.</p><br>
                    <p>Цель фонда: <span class="quote">"содействие развитию адаптивного спорта в Санкт-Петербурге,
                социализации людей с инвалидностью через спорт и формированию уважительного отношения в обществе к индивидуальным особенностям человека."</span></p><br><hr>
                    </div>
                        <p class="site">Сайт: <a target="_blank" href="https://fondopora.ru/">Точка Опоры</a></p>
            </div>
            <div class="fond">
                <h2>Центр взаимной интеграции "Аккорд"</h2>
                <img src="img/akkord.jpg">
                <div class="pl">
                <p class="akkord">Социально ориентированная некоммерческая общественная организация. Основное направление деятельности – иппотерапия, адаптивная верховая езда (проведение оздоровительных, реабилитационных, психокоррекционных, развивающих, рекреационных и спортивных занятий с использованием лошади).</p><br>
                <hr>
                </div>
                <p class="site">Сайт: <a target="_blank" href="https://www.akkord-spb.ru/">Аккорд</a></p>
            </div>
            <div class="fond">
                <h2>Благотворительная организация "Апельсин"</h2>
                <img src="img/Logo_Apelsin.png">
                <div class="pl">
                <p>Отличительной чертой данной организации является оказание индивидуальной поддержки человеку посредством общения и доверительных отношений.
                Доброволец вместе с Организацией разрабатывает индивидуальную стратегию развития по улучшению качества жизни для своего подопечного, что позволяет оказывать более качественное и комплексное сопровождение.</p><br>
                <p>Цель организации: <span class="quote">"помочь каждому ребёнку и молодому человеку с инвалидностью, оставшемуся без попечения родителей, проживающим в детских домах и интернатах, максимально раскрыть и реализовать свои возможности."</span></p><br><hr>
                </div>
                    <p class="site">Сайт: <a target="_blank" href="https://apelsindip.ru/">Апельсин</a></p>
            </div>
        </div>
        <div id="list_fond_2">
            <div class="fond">
                <h2>Фонд "Перспективы"</h2>
                <img src="img/perspectiv.png">
                <div class="pl">
                <p>"Перспективы" - это партнёрство благотворительных общественных организаций, которое работает в Санкт-Петербурге с 1996 года.
                Фонд сопровождает, поддерживает и защищает детей, взрослых и их семьи. Сотрудничает с организациями и людьми,которые разделяют их ценности. </p><br>
                <p>Цель фонда: <span class="quote">"создание для детей с тяжелыми умственными и физическими нарушениями таких условий жизни,
                    которые максимально похожи на условия жизни обычных детей,
                    а также нормализация среды, в которой им приходится жить, когда они становятся взрослыми."</span></p><br><hr>
                </div>
                    <p class="site">Сайт: <a target="_blank" href="http://www.perspektivy.ru/">Перспективы</a></p>
            </div>
            <div class="fond">
                <h2>Общественная благотворительная организация "Покровская община"</h2>
                <img src="img/pokr_o.png">
                <div class="pl">
                <p>Санкт-Петербургская общественная благотворительная организация "Покровская община" зарегистрирована в 2000 году,
                но считается, что начала свою деятельность с 90-х годов 20 века.</p><br>
                <p>Миссия организации: <span class="quote">"помощь бедным, престарелым, бездомным и одиноким людям в Мариинской больнице и на дому,
                    забота о стариках в доме престарелых «Покровская обитель», кров бездомным инвалидам в Приюте временного пребывания."</span></p><br>
                <hr>
                </div>
                <p class="site">Сайт: <a target="_blank" href="https://www.omophor.ru/">Покровская община</a></p>
            </div>
            <div class="fond">
                <h2>Фонд "Свет"</h2>
                <img src="img/light.png">
                <div class="pl">
                <p>Благотворительный фонд был основан несколькими петербуржцами в 2008 году. Помогает онкобольным детям на всей территории РФ и детям
                из других государств, имеющим необходимость лечиться в российских клиниках.
                Выделяют средства на необходимые издержки, которые не покрывает госудрство, а также содействуют в развитии детских онкологических клиник.</p><br>
                <p>Цель фонда: <span class="quote">"сделать лечение онкобольных детей максимально эффективным
                    и помочь семьям справиться с психологическими нагрузками и материальными сложностями во время лечения."</span></p><br><hr>
                </div>
                    <p class="site">Сайт: <a target="_blank" href="https://fondsvet.org/">Свет</a></p>
            </div>
        </div>
        <div id="list_fond_3">
            <div class="fond">
                <h2>Фонд "Нужна помощь"</h2>
                <img src="img/need_help.jpg">
                <div class="pl">
                <p>"Нужна помощь" - это так называемый "фонд фондов", он собирает пожертвования для других некоммерческих организаций.
                Здесь Вы можете быть абсолютно уверены в том, что поможете проверенному фонду,
                    а также будете знать структуру того, как работают общественные организации.</p><br>
                <p>Цель фонда: <span class="quote">"популяризация благотворительности и волонтерства.
                    Мы добиваемся, чтобы в СМИ выходило больше публикаций на благотворительную тематику. Мы хотим стать проектом успешных историй.
                    Мы приложим все усилия, чтобы каждая история или проблема, описанная нами, была благополучно разрешена."</span></p><br><hr>
                </div>
                    <p class="site">Сайт: <a target="_blank" href="https://rusfond.ru/spb">Русфонд</a></p>
            </div>
            <div class="fond">
                <h2>Ассоциация родителей детей-инвалидов "ГАООРДИ"</h2>
                <img src="img/GAOORDI.jpg">
                <div class="pl">
                <p>Санкт-Петербургская ассоциация общественных объединений родителей детей-инвалидов "ГАООРДИ" начала свою работу в 1992 году
                На данный момент - это 24 общественные организации родителей детей с инвалидностью, а также с редкими и генетическими заболеваниями.</p><br>
                <p>Сегодня: <span class="quote">"вместе мы системно и последовательно реализуем программы,
                    которые позволяют нашим детям быть самостоятельными в открытом обществе, учиться и трудиться,
                    дружить и заниматься творчеством, получать новые впечатления и просто быть счастливыми."</span></p><br>
                <hr>
                </div>
                <p class="site">Сайт: <a target="_blank" href="https://gaoordi.ru/">ГАООРДИ</a></p>
            </div>
            <div class="fond">
                <h2>Русфонд</h2>
                <img src="img/rusfond.png" height="160px">
                <div class="pl">
                <p>Российский фонд  помощи создан в 1996 году как благотворительная программа Издательского дома «Коммерсантъ»
                    для оказания помощи авторам отчаянных писем в газету «Коммерсантъ», на данный момент является одним из крупнейших фондов России.</p><br>
                <p>Миссия фонда: <span class="quote">"помощь тяжелобольным детям, содействие развитию гражданского общества,
                    внедрению высоких медицинских технологий."</span></p><br><hr>
                </div>
                <p class="site">Сайт: <a target="_blank" href="https://rusfond.ru/spb">Русфонд</a></p>
            </div>
        </div>
        <div class="pages">
            <a href="#" onclick = "document.getElementById('list_fond_1').style.display='block'; document.getElementById('list_fond_2').style.display='none'; document.getElementById('list_fond_3').style.display='none';">1</a>
            <a href="#" onclick = "document.getElementById('list_fond_1').style.display='none'; document.getElementById('list_fond_2').style.display='block'; document.getElementById('list_fond_3').style.display='none';">2</a>
            <a href="#" onclick = "document.getElementById('list_fond_1').style.display='none'; document.getElementById('list_fond_2').style.display='none'; document.getElementById('list_fond_3').style.display='block';">3</a>
        </div>
    </section>
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
</main>

</body>
</html>
<?php endif; ?>