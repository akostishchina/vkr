<?php
session_start();
require_once ('connection.php');

$link = mysqli_connect($host, $user, $password, $database, '3308')
or die("Ошибка " . mysqli_error($link));
mysqli_set_charset($link, "utf8");

$title_cal = htmlspecialchars(trim($_POST['title_cal']));
$priority = $_POST['priority'];
$date_cal = $_POST['date_cal'];
$to_me = htmlspecialchars($_POST['to_me']);
$who = htmlspecialchars($_POST['who']);
$min_description = htmlspecialchars($_POST['min_description']);
$more_description = htmlspecialchars($_POST['more_description']);

$id = $_SESSION['id'];


// берёт из БД пароль и id пользователя

if ((empty(trim($title_cal)) !== true) && (empty(trim($priority)) !== true)&& (empty(trim($min_description)) !== true)) {

    if(!preg_match("/^([а-яёА-ЯЁ\s])+$/u",$title_cal))
    {
        $_SESSION['calendar'] = "Название может состоять только из букв русского алфавита";
        header('Location: me.php');
        exit();

    }
    if(!preg_match("/^([а-яёА-ЯЁ\s])+$/u",$min_description))
    {
        $_SESSION['calendar'] = "Краткая информация может состоять только из букв русского алфавита";
        header('Location: me.php');
        exit();

    }
    if((empty(trim($more_description)) !== true) && (!preg_match("/^([а-яёА-ЯЁ\s])+$/u",$more_description)))
    {
        $_SESSION['calendar'] = "Полная информация может состоять только из букв русского алфавита";
        header('Location: me.php');
        exit();

    }

    $sql = "INSERT INTO `calendar` (`title_cal`, `needing_id`, `priority`, `date`, `info`, `more_info`)
VALUES('$title_cal', '$id', '$priority', '$date_cal', '$min_description', '$more_description')";

    $result = mysqli_query($link, $sql);

    if ($result) {
        $_SESSION['calendar'] = 'Информация добавлена';
        header('Location: me.php');
        exit();

    } else {
        $_SESSION['calendar'] = 'Ошибка в добавлении информации';
        header('Location: me.php');
        exit();

    }

}
else {
    $_SESSION['calendar'] = 'Не все обязательные поля заполнены';
}
?>