<?php
session_start();
require_once ('connection.php');

$link = mysqli_connect($host, $user, $password, $database, '3308')
or die("Ошибка " . mysqli_error($link));
mysqli_set_charset($link, "utf8");

$surname = htmlspecialchars(trim($_POST['surname']));
$name_user = htmlspecialchars($_POST['name_user']);
$grand_name = htmlspecialchars($_POST['grand_name']);
$sex = htmlspecialchars($_POST['sex']);
$tel = htmlspecialchars($_POST['tel']);
$data = htmlspecialchars($_POST['data']);
$address = htmlspecialchars($_POST['address']);
$about_me = htmlspecialchars($_POST['about_me']);

$image = addslashes($_FILES['my_image']['tmp_name']);
$name = addslashes($_FILES['my_image']['name']);
$image = file_get_contents($image);
$image = base64_encode($image);

$id = $_SESSION['id'];

// берёт из БД пароль и id пользователя


if(isset($_POST['surname']) && isset($_POST['name_user']) && isset($_POST['sex']) && isset($_POST['tel'])) {

    if(!preg_match("/^([a-zA-Z]|[а-яёА-ЯЁ])+$/u",$_POST['surname']))
    {
        $_SESSION['error_add_info'] = "Фамилия может состоять только из букв английского или русского алфавита";
        header('Location: profile.php');
        exit();

    }
    if(!preg_match("/^([a-zA-Z]|[а-яёА-ЯЁ])+$/u",$_POST['name_user']))
    {
        $_SESSION['error_add_info'] = "Имя может состоять только из букв английского или русского алфавита";
        header('Location: profile.php');
        exit();

    }
    if(!preg_match("/^[а-яёА-ЯЁ]+$/u",$_POST['grand_name']))
    {
        $_SESSION['error_add_info'] = "Отчество может состоять только из букв русского алфавита";
        header('Location: profile.php');
        exit();

    }

    if ($result2 = mysqli_query($link, "SELECT * FROM `privateinfo` WHERE `user_id`='" . $_SESSION['id'] . "'")) {

        while( $row2 = mysqli_fetch_assoc($result2) ){

            if (empty($name) == false) {
                $insert_image="UPDATE `privateinfo` SET `avatar` = '$image', `avatar_name`='$name' WHERE `user_id`='" . $_SESSION['id'] . "'";
                $result_image = mysqli_query($link, $insert_image);
            }
            $result_grand = mysqli_query($link, "UPDATE `privateinfo` SET `patronymic`='$grand_name' WHERE `user_id`='" . $_SESSION['id'] . "'");
            $result_address = mysqli_query($link, "UPDATE `privateinfo` SET `adress`='$address' WHERE `user_id`='" . $_SESSION['id'] . "'");
            $result_surname = mysqli_query($link, "UPDATE `privateinfo` SET `surname`='$surname' WHERE `user_id`='" . $_SESSION['id'] . "'");
            $result_name = mysqli_query($link, "UPDATE `privateinfo` SET `name`='$name_user' WHERE `user_id`='" . $_SESSION['id'] . "'");
            $result_phone = mysqli_query($link, "UPDATE `privateinfo` SET `phone`='$tel' WHERE `user_id`='" . $_SESSION['id'] . "'");
            $result_about = mysqli_query($link, "UPDATE `privateinfo` SET `about`='$about_me' WHERE `user_id`='" . $_SESSION['id'] . "'");

            $_SESSION['error_add_info'] = 'Информация обновлена';
            header('Location: profile.php');
            exit();
        }

        if (empty($name) == false) {

            $insert_image="INSERT INTO `privateinfo` (`avatar`,`avatar_name`) VALUES ('$image', '$name')";
            $result_image = mysqli_query($link, $insert_image);
        }
        $result = mysqli_query($link, "INSERT INTO `privateinfo` (`user_id`, `surname`, `name`, `patronymic`, `sex`, `birthday`, `adress`, `phone`, `about`) 
VALUES('$id','$surname', '$name_user', '$grand_name', '$sex', '$data', '$address', '$tel', '$about_me')");

        if ($result) {
            $_SESSION['error_add_info'] = 'Информация добавлена';
            header('Location: profile.php');
            exit();
        } else {
            $_SESSION['error_add_info'] = 'Ошибка в добавлении информации';
            header('Location: profile.php');
            exit();

        }
    }
}
else {
    $_SESSION['error_add_info'] = 'Не все обязательные поля заполнены';
}

?>