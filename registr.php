<?php
session_start();
require_once ('connection.php');

if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['password_again'])&& isset($_POST['id_role'])){
    if(isset($_POST['submit'])) {
        $link = mysqli_connect($host, $user, $password, $database, '3308')
        or die("Ошибка подключения к бд" . mysqli_error($link));
        mysqli_set_charset($link, "utf8");


        if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
        {
            $_SESSION['message'] = "Логин может состоять только из букв английского алфавита и цифр";
            header('Location: main_page.php#reg');
            exit();

        }

        if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)
        {
            $_SESSION['message'] = "Логин должен быть не меньше 3-х символов и не больше 30";
            header('Location: main_page.php#reg');
            exit();
        }
        if(strlen($_POST['password']) < 6)
        {
            $_SESSION['message'] = "Пароль должен быть не меньше 6 символов";
            header('Location: main_page.php#reg');
            exit();
        }

        // проверяем, не сущестует ли пользователя с таким именем
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

        }

            $login = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars($_POST['password']);
            $email = htmlspecialchars($_POST['email']);
            $password_again = htmlspecialchars($_POST['password_again']);
            $id_role = $_POST['id_role'];

            if ($password === $password_again){

                $password = md5($password);

                $sql = "INSERT INTO users (login, password, email, id_role) VALUES('$login', '$password', '$email', '$id_role')";
                $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));



            }
            else {
                $_SESSION['message'] = 'Пароли не совпадают';
                header('Location: main_page.php#reg');
                exit();
            }

        $result1 = mysqli_query($link, "SELECT * FROM `users` WHERE `login`='" . $login . "'");

        $row = mysqli_fetch_assoc($result1);
        $_SESSION['logged_user'] = $row;
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $row['user_id'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['email'] = $row['email'];
        //$_SESSION['message'] = 'Регистрация прошла успешно! Добро пожаловать на сайт Life Is Great';
        header('Location: profile.php');
    }

}

/*require('connection.php');

    if (isset($_POST['login']) && isset($_POST['password'])) {
        $login = $_POST['login'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "INSERT INTO users (login, password, email) VALUES ('$login', '$password', '$email')";
        $result = mysqli_query($connect, $query);

        if ($result){
            $smsg = "Регистрация прошла успешно";
        }
        else {
            $fsmsg = "Ошибка";
        }
    }*/
?>
