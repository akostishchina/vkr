<?php
session_start();
?>
<?php if(isset($_SESSION['logged_user'])) : ?>
    <?php require_once ('show_post.php');?>
    <?php $post_id = $_GET['post_id']?>
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
        <?php $post = get_post_by_id($post_id);?>
        <section class="post_on_new_page">
            <div class="link_update">
                <a href="notes.php">&lt; Назад</a>
            <?php
            if ($post['author'] == $_SESSION['login']): ?>
                <button id="update_note">Редактировать</button>
                <button id="del_note">Удалить</button>
            <?php endif; ?>
            </div>
            <div class="current_post">
                <h1><?=$post['title']?></h1><hr>
                <?php
                if (empty($post['name_img_post'])) {
                    echo '';
                }else {
                    echo '<img src="data:image;base64, '.$post['img_post'].'">';
                }?>
                <div class="content_post">
                    <?=$post['content1']?>
                </div><hr>
                <div class="current_data">
                    <p><?=$post['author']?></p>
                    <p><?=$post['post_date']?></p>
                </div>
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
        <div id="post_update" class="gray">
            <div class="post_content">
                <form action="new_post.php?action=edit&id=<?=$post['post_id']?>" method="POST" enctype="multipart/form-data">
                <div class="post_main">
                    <div class="post_main_text">
                        <textarea name="new_post_title"><?php echo $post['title']?></textarea><br>
                    </div>
                    <?php
                    if (empty($post['name_img_post'])) {
                        echo '';
                    }else {
                        echo '<img src="data:image;base64, '.$post['img_post'].'">';
                    }?>
                </div>
                    <input type="file" name="new_post_photo">
                    <div class="content_update">
                        <textarea class="post_content_info" tabindex="0" name="new_post_content"><?=$post['content1']?></textarea>
                    </div>
                    <div class="up_data">
                        <input type="submit" value="Сохранить">
                    </div>
                </form>
                <button class="ex1 close_update"><i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="modal" tabindex="0" role="dialog" aria-labelled-by="modaltitle" id="note_delete">
            <div class="modal__content">
                <div class="info_save">
                    <h2 class="save-head">Вы уверены?</h2>
                    <h4>При нажатии на эту кнопку статья будет удалена.</h4>
                </div>
                <div class="btns">
                    <a class="positive" href="new_post.php?action=delete&id=<?=$post['post_id']?>">Да</a>
                    <input type="button" class="round no_delete1" value="Отмена">
                </div>
                <button class="ex1 no_delete2"><i class="fas fa-times"></i></button>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="preloader.js"></script>
        <script src="post_delete.js"></script>
        <script src="update_post.js"></script>
        <script src="exit_to_main_page.js"></script>
        <script src="change_data.js"></script>
        <script src="ckeditor_4.14.0_standard/ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('new_post_content');
        </script>
    </main>
    </body>
    </html>
<?php endif; ?>