<?php
session_start();
require_once ('connection.php');

if(isset($_POST['login']) && isset($_POST['password'])) {
    if (isset($_POST['submit'])) {
        $link = mysqli_connect($host, $user, $password, $database, '3308')
        or die("Ошибка " . mysqli_error($link));
        mysqli_set_charset($link, "utf8");

        $login = htmlspecialchars($_POST['login']);
        $password = md5($_POST['password']);

    // берёт из БД пароль и id пользователя
        if ($result = mysqli_query($link, "SELECT `password`, `user_id` FROM `users` WHERE `login`='" . $login . "'")) {
            while( $row = mysqli_fetch_assoc($result) ){
                // Проверяет есть ли id
                if ($row['user_id']) {
                    echo $row['password'];
                    // если id есть, то он сравнивает пароли
                    if ($password === $row['password']) {
                        // Если функция возвращает true, то вы входите
                        //$_SESSION['message'] = 'Добро пожаловать на сайт Life Is Great';
                        $result1 = mysqli_query($link, "SELECT * FROM `users` WHERE `login`='" . $login . "'");
                        $row1 = mysqli_fetch_assoc($result1);

                        $_SESSION['logged_user'] = $row;
                        $_SESSION['login'] = $login;
                        $_SESSION['id'] = $row1['user_id'];
                        $_SESSION['password'] = $row1['password'];
                        $_SESSION['email'] = $row1['email'];
                        header('Location: profile.php');
                        print_r($row);
                        exit();
                    } else {
                        // Если функция возвращает false, то выводит ошибку
                        $_SESSION['message_auth'] = 'Пароль не совпадает';
                        header('Location: main_page.php');
                        exit();
                    }
                } else {
                    // Выводит ошибку если не нашли такой логин
                    $_SESSION['message_auth'] = 'Ввели неверный логин';
                    header('Location: main_page.php');
                    exit();
                }
            }
        }

        $_SESSION['message_auth'] = 'Ввели неверный логин';
        header('Location: main_page.php');

        /*print_r($row);*/
        //print_r($_POST);


    }
}
?>

