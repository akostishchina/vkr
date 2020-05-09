<?php
session_start();
require_once ('connection.php');

// берёт из БД пароль и id пользователя
if(isset($_POST['submit'])) {

    $link = mysqli_connect($host, $user, $password, $database, '3308')
    or die("Ошибка " . mysqli_error($link));
    mysqli_set_charset($link, "utf8");

    $new_login = htmlspecialchars(trim($_POST['new_login']));
    $new_email = htmlspecialchars($_POST['new_email']);
    $old_password = htmlspecialchars($_POST['old_password']);
    $new_password = htmlspecialchars($_POST['new_password']);
    $again_new_password = htmlspecialchars($_POST['again_new_password']);

    /*

    $query = mysqli_query($link, "SELECT user_id FROM users WHERE login='".mysqli_real_escape_string($link, $_POST['login'])."'");
    if(mysqli_num_rows($query) > 0)
    {
        $_SESSION['message'] = "Пользователь с таким логином уже существует в базе данных";
        header('Location: main_page.php#reg');
        exit();

    }
    $query = mysqli_query($link, "SELECT user_id FROM users WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."'");
    if(mysqli_num_rows($query) > 0)
    {
        $_SESSION['message'] = "Пользователь с таким e-mail уже существует в базе данных";
        header('Location: main_page.php#reg');
        exit();

    }*/

    if ($result_update_user = mysqli_query($link, "SELECT * FROM `users` WHERE `user_id`='" . $_SESSION['id'] . "'")) {
        while( $row2 = mysqli_fetch_assoc($result_update_user) ){
            if ($new_login != $_SESSION['login']) {
                if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['new_login']))
                {
                    $_SESSION['error_new_data'] = "Логин может состоять только из букв английского алфавита и цифр";
                    header('Location: profile.php');
                    exit();
                }
                if(strlen($_POST['new_login']) < 3 or strlen($_POST['new_login']) > 30)
                {
                    $_SESSION['error_new_data'] = "Логин должен быть не меньше 3-х символов и не больше 30";
                    header('Location: profile.php');
                    exit();
                }
                $query_new_login = mysqli_query($link, "SELECT user_id FROM users WHERE login='".mysqli_real_escape_string($link, $_POST['new_login'])."'");
                if(mysqli_num_rows($query_new_login) > 0)
                {
                    $_SESSION['error_new_data'] = "Пользователь с таким логином уже существует в базе данных";
                    header('Location: profile.php');
                    exit();

                }
                $result_new_login = mysqli_query($link, "UPDATE `users` SET `login`='$new_login' WHERE `user_id`='" . $_SESSION['id'] . "'");
                $_SESSION['login'] = $new_login;
                header('Location: profile.php');
            }
            if ($new_email != $_SESSION['email']) {
                $query_new_email = mysqli_query($link, "SELECT user_id FROM users WHERE email='".mysqli_real_escape_string($link, $_POST['new_email'])."'");
                if(mysqli_num_rows($query_new_email) > 0)
                {
                    $_SESSION['error_new_data'] = "Пользователь с таким e-mail уже существует в базе данных";
                    header('Location: profile.php');
                    exit();

                }
                $_SESSION['email'] = $new_email;
                $result_new_email = mysqli_query($link, "UPDATE `users` SET `email`='$new_email' WHERE `user_id`='" . $_SESSION['id'] . "'");
                header('Location: profile.php');
            }
            if((strlen($_POST['old_password'])>5) && (strlen($_POST['new_password'])>5) && (strlen($_POST['again_new_password'])>5)){
                    if ($new_password===$again_new_password){

                        $old_password = md5($old_password);
                        if($row2['password'] === $old_password)
                        {
                            $new_password = md5($new_password);
                            $result_new_password = mysqli_query($link, "UPDATE `users` SET `password`='$new_password' WHERE `user_id`='" . $_SESSION['id'] . "'");
                            $_SESSION['password'] = $new_password;
                            header('Location: profile.php');
                        }
                        else {
                            $_SESSION['error_new_data'] = "Неверный старый пароль";
                            header('Location: profile.php');
                            exit();
                        }
                    }
                    else {
                        $_SESSION['error_new_data'] = "Пароли не совпадают";
                        header('Location: profile.php');
                        exit();
                    }
            }
            $smsg = 'Данные обновлены';
        }
    }

}
?>