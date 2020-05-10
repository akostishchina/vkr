<?php
    session_start();
    require_once ('connection.php');

    $link = mysqli_connect($host, $user, $password, $database, '3308')
    or die("Ошибка " . mysqli_error($link));
    mysqli_set_charset($link, "utf8");

    //проверяем чего от нас хотят
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    }
    else {
        $action = "";
    }


    //добавление новой статьи

    $title_post = trim($_POST['title_post']);
    $content_post = trim($_POST['content_post']);
    $image = addslashes($_FILES['image_post']['tmp_name']);
    $name = addslashes($_FILES['image_post']['name']);
    $image = file_get_contents($image);
    $image = base64_encode($image);
    $login = $_SESSION['login'];

    if (isset($title_post) && isset($content_post)) {
        $sql = "INSERT INTO `posts` (`title`, `content1`, `author`, `img_post`, `name_img_post`) 
VALUES('$title_post', '$content_post', '$login', '$image', '$name')";
        $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
        if ($result) {
            header('Location: notes.php');
            exit();
        }
        else {

            header('Location: notes.php');
            exit();
        }
    }
    else {
        header('Location: notes.php');
        exit();
    }

if ($action == 'delete') {
    $id = $_GET['id'];

    }
?>