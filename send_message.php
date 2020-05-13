<?php
session_start();
require_once ('connection.php');

$link = mysqli_connect($host, $user, $password, $database, '3308')
or die("Ошибка подключения к бд" . mysqli_error($link));
mysqli_set_charset($link, "utf8");

$user_one = $_SESSION['id'];
$second_user = 6;
$message = $_POST['message_text'];


if ($user_one != $second_user) {
    //echo 'пользователи разные ';
    //поиск диалога
    $row_dialog = mysqli_query($link, "SELECT `id_d` FROM `dialogs` WHERE (`first_user_id` = '{$user_one}' AND `second_user_id` = '{$second_user}') 
                                OR (`first_user_id` = '{$second_user}' AND `second_user_id` = '{$user_one}')");
    $row_message = mysqli_fetch_assoc($row_dialog);
    //echo 'ищем диалог по идентификатору ';
    //если нет существующего диалога, то нужно его создать
    if (!isset($row_message['id_d'])) {
        //echo 'диалог не найден ';
        $new_dialog = mysqli_query($link,"INSERT INTO `dialogs` (`first_user_id`, `second_user_id`, `last_message_id`, `sender`, `first_delete`, `second_delete`, `num_unread`)
        VALUES
            ('{$user_one}', '{$second_user}', '0', '{$user_one}', '0', '0', '0')");

        // ID последнего запроса
        $last_conversation_id = mysqli_insert_id($link);
        //echo $last_conversation_id;
    } else {
        //echo 'диалог найден ';
        $last_conversation_id = $row_message['id_d'];
        //echo $last_conversation_id;
    }

    // Добавляем сообщение
    $row_messages = mysqli_query($link,"INSERT INTO `message` (`dialog_id`, `sender_id`, `addressee_id`, `readed`, `sender_delete`, `addressee_delete`, `content`, `date`)
    VALUES ('{$last_conversation_id}', '{$user_one}', '{$second_user}', '0', '0', '0', '{$message}', '".date("Y-m-d H:i:s")."')");

    $row_last_m = mysqli_query($link, "SELECT `id_message` FROM `message` WHERE `dialog_id` = '" . $last_conversation_id . "' ORDER BY `date` DESC");
    $row = mysqli_fetch_assoc($row_last_m);
    //echo $row['id_message'];
    if ($row) {
        // Обновляем таблицу с диалогом
       $update_dialog = mysqli_query($link, "UPDATE `dialogs` SET `last_message_id`= '{$row['id_message']}', `sender` = '{$user_one}',`num_unread` = (SELECT COUNT(*) FROM `message` WHERE `dialog_id` = '{$last_conversation_id}' AND `readed` = '0' AND `sender_id` = '{$user_one}')
    WHERE
        `id_d` = '{$last_conversation_id}'");
    }
    else {
        echo 'В таблицу диалогов не добавилась инфа о сообщении';
    }
    header('Location: message.php');
}
?>