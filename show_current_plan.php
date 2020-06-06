<?php

require_once ('connection.php');

$link = mysqli_connect('localhost', 'root', '', 'myvkr', '3308')
or die("Ошибка подключения к бд" . mysqli_error($link));
mysqli_set_charset($link, "utf8");

$plan = $_GET['id'];

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
else {
    $action = "";
}

if ($action == 'delete') {

    $sql_delete = "DELETE FROM `calendar` WHERE `id_help` = '" . $plan . "'";
    $result_delete = mysqli_query($link, $sql_delete) or die("Ошибка " . mysqli_error($link));

    if ($result_delete) {
        header('Location: me.php');
        exit();
    } else {
        $_SESSION['calendar'] = "Просьба не удалена";
        header('Location: me.php');
        exit();
    }
}elseif ($action == 'edit') {

    if (isset($_GET['uid'])) {

        $u_id = $_GET['uid'];
        $new_who = htmlspecialchars(trim($_POST['new_who']));

        $check_log = mysqli_query($link, "SELECT `login`, `id_role` FROM `users` WHERE `user_id` = '" . $u_id . "'");
        $result_check_log = mysqli_fetch_array($check_log);
        if ($result_check_log) {
            if (($result_check_log['login'] == $new_who) && ($result_check_log['id_role']) != 1) {

                $sql = "UPDATE `calendar` SET `helper_id` = '$u_id' WHERE `id_help` = '" . $plan . "'";
                $result = mysqli_query($link, $sql);

                if ($result) {
                    $_SESSION['calendar'] = 'Информация обновлена';
                    header('Location: me.php');
                    exit();

                } else {
                    $_SESSION['calendar'] = 'Ошибка в обновлении информации';
                    header('Location: me.php');
                    exit();

                }

            }
        }else {
            $_SESSION['calendar'] = 'Проверьте логин пользователя';
            header('Location: me.php');
            exit();
        }

    }else {

        $title_cal = htmlspecialchars(trim($_POST['new_title_cal']));
        $priority = $_POST['new_priority'];
        $date_cal = $_POST['new_date_cal'];
        $min_description = htmlspecialchars($_POST['new_info']);
        $more_description = htmlspecialchars($_POST['new_more_info']);


// берёт из БД пароль и id пользователя

        if ((empty(trim($title_cal)) !== true) && (empty(trim($priority)) !== true) && (empty(trim($min_description)) !== true)) {

            if (!preg_match("/^([а-яёА-ЯЁ\s])+$/u", $title_cal)) {
                $_SESSION['calendar'] = "Название может состоять только из букв русского алфавита";
                header('Location: me.php');
                exit();

            }
            if (!preg_match("/^([а-яёА-ЯЁ\s])+$/u", $min_description)) {
                $_SESSION['calendar'] = "Краткая информация может состоять только из букв русского алфавита";
                header('Location: me.php');
                exit();

            }
            if ((empty(trim($more_description)) !== true) && (!preg_match("/^([а-яёА-ЯЁ\s])+$/u", $more_description))) {
                $_SESSION['calendar'] = "Полная информация может состоять только из букв русского алфавита";
                header('Location: me.php');
                exit();

            }

            $sql = "UPDATE `calendar` SET `title_cal` = '$title_cal', `priority` = '$priority', `date` = '$date_cal', `info` = '$min_description', `more_info` = '$more_description'
WHERE `id_help` = '" . $plan . "'";

            $result = mysqli_query($link, $sql);

            if ($result) {
                $_SESSION['calendar'] = 'Информация обновлена';
                header('Location: me.php');
                exit();

            } else {
                $_SESSION['calendar'] = 'Ошибка в обновлении информации';
                header('Location: me.php');
                exit();

            }

        } else {
            $_SESSION['calendar'] = 'Не все обязательные поля заполнены';
        }
    }
}

?>