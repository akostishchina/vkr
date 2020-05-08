<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ресурс для помощи людям</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="style_me.css">
    <link rel="stylesheet" href="style_notes.css">
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
                    <span class="submenuProfile">Логин</span>
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
                <a href="me.php">
                    <div class="img_n">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <span>Календарь</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="img_n">
                        <i class="far fa-sticky-note"></i>
                    </div>
                    <span class="here1">Статьи</span>
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
        <form action="" >
            <h4 class="change-head">Редактирование данных</h4>
            <div class="reg-data">
                <input type="text" placeholder="Логин">
            </div>
            <div class="reg-data">
                <input type="email" placeholder="Почта">
            </div>
            <a href="#" class="change_password">Вы хотите изменить пароль?</a>
            <div id="new_password" class="new_password">
                <div class="reg-data">
                    <input type="password" placeholder="Старый пароль">
                </div>
                <div class="reg-data">
                    <input type="password" placeholder="Новый пароль">
                </div>
                <div class="reg-data">
                    <input type="password" placeholder="Повторение нового пароля">
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
    <section class="notes">
        <div class="note">

            <h3>Путин поручил регионам привлекать НКО к работе с детьми с ментальной инвалидностью</h3>
            <div class="main_info">

                <blockquote class="bq2">
                    <p>Президент России Владимир Путин поручил главам регионов развивать систему работы с семьями, воспитывающими детей с ментальной
                        инвалидностью, в том числе привлекая некоммерческие организации (НКО). Такой пункт содержится в перечне поручений по итогам встречи
                        главы государства с представителями общественности 4 февраля.</p>
                </blockquote>
                <img src="img/note_1.jpg" alt="">
            </div>
                <div class="note_info">
                    <a href="https://tass.ru/obschestvo/8234173"><p>ТАСС</p></a>
                    <a href="#" id="more_note_1">Читать далее &rarr;</a>
                </div>
        </div>
        <div class="note">

            <h3>Заголовок статьи</h3>
            <div class="main_info">

                <blockquote class="bq2">
                    <p>Сама  статья должна быть красивой и необычной, но важной по смыслу<br>Сама  статья должна быть красивой и необычной, но важной по смыслу<br>Сама  статья должна быть красивой и необычной, но важной по смыслу<br>Сама  статья должна быть красивой и необычной, но важной по смыслу<br></p>
                </blockquote>
                <img src="img/note.jpg" alt="">
            </div>
            <div class="note_info">
                <p>Фамилия Имя (или ник)</p>
                <a href="#">Читать далее &rarr;</a>
            </div>
        </div>
        <div class="note">

            <h3>Заголовок статьи</h3>
            <div class="main_info">

                <blockquote class="bq2">
                    <p>Сама  статья должна быть красивой и необычной, но важной по смыслу<br>Сама  статья должна быть красивой и необычной, но важной по смыслу<br>Сама  статья должна быть красивой и необычной, но важной по смыслу<br>Сама  статья должна быть красивой и необычной, но важной по смыслу<br></p>
                </blockquote>
                <img src="img/note.jpg" alt="">
            </div>
            <div class="note_info">
                <p>Фамилия Имя (или ник)</p>
                <a href="#">Читать далее &rarr;</a>
            </div>
        </div>
        <div class="note">

            <h3>Заголовок статьи</h3>
            <div class="main_info">

                <blockquote class="bq2">
                    <p>Сама  статья должна быть красивой и необычной, но важной по смыслу<br>Сама  статья должна быть красивой и необычной, но важной по смыслу<br>Сама  статья должна быть красивой и необычной, но важной по смыслу<br>Сама  статья должна быть красивой и необычной, но важной по смыслу<br></p>
                </blockquote>
                <img src="img/note.jpg" alt="">
            </div>
            <div class="note_info">
                <p>Фамилия Имя (или ник)</p>
                <a href="#">Читать далее &rarr;</a>
            </div>
        </div>
        <div class="note">

            <h3>Заголовок статьи</h3>
            <div class="main_info">

                <blockquote class="bq2">
                    <p>Сама  статья должна быть красивой и необычной, но важной по смыслу<br>Сама  статья должна быть красивой и необычной, но важной по смыслу<br>Сама  статья должна быть красивой и необычной, но важной по смыслу<br>Сама  статья должна быть красивой и необычной, но важной по смыслу<br></p>
                </blockquote>
                <img src="img/note.jpg" alt="">
            </div>
            <div class="note_info">
                <p>Фамилия Имя (или ник)</p>
                <a href="#">Читать далее &rarr;</a>
            </div>
        </div>
        <div class="note">

            <h3>Заголовок статьи</h3>
            <div class="main_info">

                <blockquote class="bq2">
                    <p>Сама  статья должна быть красивой и необычной, но важной по смыслу<br>Сама  статья должна быть красивой и необычной, но важной по смыслу<br>Сама  статья должна быть красивой и необычной, но важной по смыслу<br>Сама  статья должна быть красивой и необычной, но важной по смыслу<br></p>
                </blockquote>
                <img src="img/note.jpg" alt="">
            </div>
            <div class="note_info">
                <p>Фамилия Имя (или ник)</p>
                <a href="#">Читать далее &rarr;</a>
            </div>
        </div>
        <div class="note">

            <h3>Заголовок статьи</h3>
            <div class="main_info">

                <blockquote class="bq2">
                    <p>Сама  статья должна быть красивой и необычной, но важной по смыслу<br>Сама  статья должна быть красивой и необычной, но важной по смыслу<br>Сама  статья должна быть красивой и необычной, но важной по смыслу<br>Сама  статья должна быть красивой и необычной, но важной по смыслу<br></p>
                </blockquote>
                <img src="img/note.jpg" alt="">
            </div>
            <div class="note_info">
                <p>Фамилия Имя (или ник)</p>
                <a href="#">Читать далее &rarr;</a>
            </div>
        </div>
        <div class="note">

            <h3>Заголовок статьи</h3>
            <div class="main_info">

                <blockquote class="bq2">
                    <p>Сама  статья должна быть красивой и необычной, но важной по смыслу<br>Сама  статья должна быть красивой и необычной, но важной по смыслу<br>Сама  статья должна быть красивой и необычной, но важной по смыслу<br>Сама  статья должна быть красивой и необычной, но важной по смыслу<br></p>
                </blockquote>
                <img src="img/note.jpg" alt="">
            </div>
            <div class="note_info">
                <p>Фамилия Имя (или ник)</p>
                <a href="#">Читать далее &rarr;</a>
            </div>
        </div>
        <div class="note">

            <h3>Заголовок статьи</h3>
            <div class="main_info">

                <blockquote class="bq2">
                    <p>Сама  статья должна быть красивой и необычной, но важной по смыслу<br>Сама  статья должна быть красивой и необычной, но важной по смыслу<br></p>
                </blockquote>
                <img src="img/note.jpg" alt="">
            </div>
            <div class="note_info">
                <p>Фамилия Имя (или ник)</p>
                <a href="#">Читать далее &rarr;</a>
            </div>
        </div>
        <div id="post" class="gray">
            <div class="post_content">
                <div class="post_main">
                    <div class="post_main_text">
                        <h3>Путин поручил регионам привлекать НКО к работе с детьми с ментальной инвалидностью</h3><br>
                        <p>ТАСС</p>
                    </div>
                    <img src="img/note_1.jpg" alt="Дети с ментальной инвалидностью">
                </div>
                <div class="post_content_info" tabindex="0">
                    <p>Президент России Владимир Путин поручил главам регионов развивать систему работы с семьями, воспитывающими детей с ментальной
                        инвалидностью, в том числе привлекая некоммерческие организации (НКО). Такой пункт содержится в перечне поручений по итогам встречи
                        главы государства с представителями общественности 4 февраля.</p><br>
                    <p>"Органам исполнительной власти субъектов Российской Федерации развивать систему социально-реабилитационной работы с семьями,
                        воспитывающими детей с ментальной инвалидностью, предусмотрев при этом использование механизмов государственно-частного партнерства,
                        а также привлечение некоммерческих организаций, в том числе добровольческих организаций", - говорится в перечне поручений.
                        Президент ждет первых докладов по этому вопросу до 15 июня, а затем ежегодно до 2025 года.</p><br>
                    <p>Во время февральской встрече в Череповце о своем некоммерческом проекте по поддержке детей с ментальными нарушениями рассказывал
                        эксперт ОНФ, член Общественной палаты Московской области Егор Козловский. Его компания занимается разработкой бесплатной цифровой
                        мобильной платформы, которая работает с технологией дополненной реальности и позволяет развивать детям с ментальными нарушениями
                        обучаться, адаптироваться в обществе и приобретать различные социальные навыки. Козловский рассказал о положительном опыте
                        этой методики и попросил о финансовой поддержке, которая помогла бы масштабировать имеющиеся наработки.</p><br>
                    <p>Путин отметил, что подобные проекты должны поддерживаться через систему государственных грантов.
                        Присутствовавшая на встрече вице-премьер Татьяна Голикова добавила, что вопрос можно решить в рамках поручения по итогам
                        послания президента Федеральному собранию, которое касалось поддержки некоммерческих организаций в регионах.</p>
                </div>
                <button class="ex1 close_post"><i class="fas fa-times"></i></button>
            </div>
        </div>
    </section>
    <section>
        <div  class="gray" id="add_note">
            <form action="" class="add_notes">
                <div class="please">
                    <a href="#" class="down"><i class="fas fa-angle-double-down"></i></a>
                    <a href="#" class="exit3 no_new_note2"><i class="fas fa-times"></i></a>
                </div>
                <h3>Новая статья</h3>
                <textarea id="caption" cols="45" rows="2" placeholder="Введите свой заголовок" autofocus></textarea>
                <input type="file"><br>
                <textarea id="article" cols="78" rows="15" placeholder="Введите текст статьи"></textarea><br>
                <input type="reset" class="no_new_note1" value="Отмена">
                <input type="submit" id="1" value="Сохранить">
            </form>
        </div>
            <button id="add_state">+ Добавить статью</button>
    </section>
    <div class="modal" id="modal" tabindex="0" role="dialog" aria-labelled-by="modaltitle">
        <div class="modal__content">
            <div class="info_save">
                <h2 class="save-head">Вы уверены?</h2>
                <h4>Вы хотите покинуть страницу?</h4>
            </div>
            <div class="btns">
                <input type="button" class="positive" id="exit_to_main_page" value="Выйти">
                <input type="button" class="round no_exit1" value="Отмена">
            </div>
            <button class="ex1 no_exit"><i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="modal" tabindex="0" role="dialog" aria-labelled-by="modaltitle" id="note_save">
        <div class="modal__content">
            <div class="info_save">
                <h2 class="save-head">Вы уверены?</h2>
                <h4>При нажатии на эту кнопку статья будет сохранена.</h4>
            </div>
            <div class="btns">
                <input type="button" class="positive" id="positive_btn" value="Сохранить">
                <input type="button" class="round exit5" value="Отмена">
            </div>
            <button class="ex1 exit6"><i class="fas fa-times"></i></button>
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
    <script src="new_note.js"></script>
    <script src="note_save.js"></script>
    <script src="pop-up.js"></script>
    <script src="preloader.js"></script>
    <script src="exit_to_main_page.js"></script>
    <script src="change_data.js"></script>
    <script src="posts.js"></script>
</main>
</body>
</html>