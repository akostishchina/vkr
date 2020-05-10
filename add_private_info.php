<?php
session_start();
require_once ('connection.php');

$link = mysqli_connect($host, $user, $password, $database, '3308')
or die("Ошибка " . mysqli_error($link));
mysqli_set_charset($link, "utf8");

$surname = htmlspecialchars(trim($_POST['surname']));
$name = htmlspecialchars($_POST['name']);
$grand_name = htmlspecialchars($_POST['grand_name']);
$sex = htmlspecialchars($_POST['sex']);
$tel = htmlspecialchars($_POST['tel']);
$data = htmlspecialchars($_POST['data']);
$address = htmlspecialchars($_POST['address']);
$about_me = htmlspecialchars($_POST['about_me']);

$id = $_SESSION['id'];

// берёт из БД пароль и id пользователя


if(isset($_POST['surname']) && isset($_POST['name']) && isset($_POST['sex']) && isset($_POST['tel'])) {

    if ($result2 = mysqli_query($link, "SELECT * FROM `privateinfo` WHERE `user_id`='" . $_SESSION['id'] . "'")) {
        while( $row2 = mysqli_fetch_assoc($result2) ){

            $result_grand = mysqli_query($link, "UPDATE `privateinfo` SET `patronymic`='$grand_name' WHERE `user_id`='" . $_SESSION['id'] . "'");
            $result_address = mysqli_query($link, "UPDATE `privateinfo` SET `adress`='$address' WHERE `user_id`='" . $_SESSION['id'] . "'");
            $result_surname = mysqli_query($link, "UPDATE `privateinfo` SET `surname`='$surname' WHERE `user_id`='" . $_SESSION['id'] . "'");
            $result_name = mysqli_query($link, "UPDATE `privateinfo` SET `name`='$name' WHERE `user_id`='" . $_SESSION['id'] . "'");
            $result_phone = mysqli_query($link, "UPDATE `privateinfo` SET `phone`='$tel' WHERE `user_id`='" . $_SESSION['id'] . "'");
            $result_about = mysqli_query($link, "UPDATE `privateinfo` SET `about`='$about_me' WHERE `user_id`='" . $_SESSION['id'] . "'");

            $smsg = 'Информация обновлена';
        }
    }

    if(!preg_match("/^([a-zA-Z]|[а-яёА-ЯЁ])+$/u",$_POST['surname']))
    {
        $_SESSION['error_add_info'] = "Фамилия может состоять только из букв английского или русского алфавита";
        header('Location: profile.php');
        exit();

    }
    if(!preg_match("/^([a-zA-Z]|[а-яёА-ЯЁ])+$/u",$_POST['name']))
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

    $image = addslashes($_FILES['my_image']['tmp_name']);
    $name = addslashes($_FILES['my_image']['name']);
    $image = file_get_contents($image);
    $image = base64_encode($image);


        $insert_image="UPDATE `privateinfo` SET `avatar` = '$image', `avatar_name`='$name' WHERE `user_id`='" . $_SESSION['id'] . "'";
        $result_image = mysqli_query($link, $insert_image);

        if ($result_image) {
            echo "</br>Yes";
        }
        else {
            echo "</br>No";
        }



    if ($_SESSION['login']) {
        $result = mysqli_query($link, "INSERT INTO `privateinfo` (`user_id`, `surname`, `name`, `patronymic`, `sex`, `birthday`, `adress`, `phone`, `about`) 
VALUES('$id','$surname', '$name', '$grand_name', '$sex', '$data', '$address', '$tel', '$about_me')");

        if ($result) {
            $smsg = 'Информация добавлена';
        } else {
            echo 'Ошибка в добавлении информации';

        }
    }
    /*$my_image = $_POST['my_image'];
    $image_name=$_FILES[$my_image]["name"];

//Получаем содержимое изображения и добавляем к нему слеш
    $imagetmp=addslashes(file_get_contents($_FILES[$my_image]['tmp_name']));

//Вставляем имя изображения и содержимое изображения в image_table
    $insert_image="INSERT INTO `users` (`avatar`, `avatar_name`) VALUES('$imagetmp','$image_name')";

    mysqli_query($link, $insert_image);*/
}
else {
    echo 'Не все обязательные поля заполнены';
}

$result_img = mysqli_query($link, "SELECT * FROM `privateinfo` WHERE `user_id`='" . $_SESSION['id'] . "'");
while($row_img = mysqli_fetch_array($result_img)) {
    echo '<img height="200" width="200" src="data:image;base64, '.$row_img['avatar'].'">';
}

?>