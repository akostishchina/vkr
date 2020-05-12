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

    if ($action == 'delete') {
        $id = $_GET['id'];
        $sql_delete = "DELETE FROM `posts` WHERE `post_id` = '" . $id . "'";
        $result_delete = mysqli_query($link, $sql_delete) or die("Ошибка " . mysqli_error($link));

        if ($result_delete) {
            header('Location: notes.php');
            exit();
        } else {
            $_SESSION['message_post'] = "Статья не удалена";
            header('Location: notes.php');
            exit();
        }

    } elseif ($action == 'edit') {

        $id = $_GET['id'];
        $new_title_post = trim($_POST['new_post_title']);
        $new_content_post = trim($_POST['new_post_content']);
        $new_image = addslashes($_FILES['new_post_photo']['tmp_name']);
        $new_name = addslashes($_FILES['new_post_photo']['name']);
        $new_image = file_get_contents($new_image);
        $new_image = base64_encode($new_image);

        $login = $_SESSION['login'];

        if ((empty(trim($new_title_post)) !== true) && (empty(trim($new_content_post)) !== true)) {
            if (empty($new_name)) {
                $sql_update = "UPDATE `posts` SET `title` = '$new_title_post', `content1`='$new_content_post' 
WHERE `post_id` = '" . $id . "'";
            } else {
                $sql_update = "UPDATE `posts` SET `title` = '$new_title_post', `content1`='$new_content_post', `img_post` = '$new_image', `name_img_post`='$new_name' 
WHERE `post_id` = '" . $id . "'";
            }
            $result_update = mysqli_query($link, $sql_update) or die("Ошибка " . mysqli_error($link));
            if ($result_update) {
                header('Location: notes.php');
                exit();
            } else {
                $_SESSION['message_post'] = "Статья не обновлена";
                header('Location: notes.php');
                exit();
            }
        } else {
            $_SESSION['message_post'] = "Статья не обнвлена, возможно введены пустые строки";
            header('Location: notes.php');
            exit();
        }

    } elseif ($action == '') {
        $title_post = trim($_POST['title_post']);
        $content_post = trim($_POST['content_post']);
        $image = addslashes($_FILES['image_post']['tmp_name']);
        $name = addslashes($_FILES['image_post']['name']);
        $image = file_get_contents($image);
        $image = base64_encode($image);
        $login = $_SESSION['login'];

        if ((empty(trim($title_post)) !== true) && (empty(trim($content_post)) !== true)) {
            if (empty($new_name)) {
                $sql = "INSERT INTO `posts` (`title`, `content1`, `author`)
VALUES('$title_post', '$content_post', '$login')";
            } else {
                $sql = "INSERT INTO `posts` (`title`, `content1`, `author`, `img_post`, `name_img_post`)
VALUES('$title_post', '$content_post', '$login', '$image', '$name')";
            }

            $result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
            if ($result) {
                header('Location: notes.php');
                exit();
            } else {
                $_SESSION['message_post'] = "Статья не добавлена";
                header('Location: notes.php');
                exit();
            }
        } else {
            $_SESSION['message_post'] = "Статья не добавлена, возможно введены пустые строки";
            header('Location: notes.php');
            exit();
        }
    }
?>