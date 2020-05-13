<?php

function show_all_dialogs() {
    require_once ('connection.php');

    $link = mysqli_connect('localhost', 'root', '', 'myvkr', '3308')
    or die("Ошибка подключения к бд" . mysqli_error($link));
    mysqli_set_charset($link, "utf8");
    global $link;
    $user_one = $_SESSION['id'];

    $sql_result = mysqli_query($link, "SELECT
    `U`.`user_id`,
    `U`.`login`,
    `D`.`id_d`,
    `D`.`sender`,
    `D`.`num_unread`,
    `M`.`content`,
    `M`.`date`
FROM
    `users` `U`,
    `dialogs` `D`
LEFT JOIN
    `message` `M` ON (`D`.`last_message_id` = `M`.`id_message`)
WHERE
    (`D`.`first_user_id` = '" . $user_one . "' OR `D`.`second_user_id` = '" . $user_one . "')
    AND
    CASE
        WHEN `D`.`first_user_id` = '" . $user_one . "'
            THEN `D`.`second_user_id` = `U`.`user_id` AND `D`.`first_delete` = '0'
        WHEN `D`.`second_user_id` = '" . $user_one . "'
            THEN `D`.`first_user_id` = `U`.`user_id` AND `D`.`second_delete` = '0'
    END
ORDER BY `D`.`num_unread` DESC");

    $all_dialogs = mysqli_fetch_all($sql_result, MYSQLI_ASSOC);

    return $all_dialogs;
}

?>
<?php require_once ('show_dialogs.php');?>
<?php $all_dialogs = show_all_dialogs();?>
<?php foreach($all_dialogs as $dialogs): ?>

    <div class="m">
        <img src="img/mark.jpg">
        <div class="info">
            <p class="name"><?=$dialogs['login']?></p>
            <p>><?=$dialogs['content']?></p>
        </div>
        <p class="n_m">1</p>
    </div>
<?php endforeach;?>