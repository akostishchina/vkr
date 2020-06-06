<?php

    require_once ('connection.php');

    $link = mysqli_connect('localhost', 'root', '', 'myvkr', '3308')
    or die("Ошибка подключения к бд" . mysqli_error($link));
    mysqli_set_charset($link, "utf8");
    global $link;
    $user_one = $_SESSION['id'];

    $query = "SELECT
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
ORDER BY `D`.`num_unread` DESC
";
    $sql_result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));


    $rows = mysqli_num_rows($sql_result);

	for ($i = 0; $i< $rows; ++$i) {
		$of = mysqli_fetch_array($sql_result);

        $query_photo = mysqli_query($link, "SELECT `avatar` FROM `privateinfo` WHERE `user_id` = '".$of['user_id']."'");
        $of_photo = mysqli_fetch_array($query_photo);

        $_SESSION['another_one'] = $of['user_id'];

        echo '
        <a href="message.php?mes_id=' . $_SESSION['another_one'] . '">
		<div class="m">';

		    if ($of_photo['avatar']) {
                echo '<img src="data:image;base64, ' . $of_photo['avatar'] . '">';
            }
		    else {
                echo '<img src="img/ava.png" alt="">';
            }
                echo'<div class="info">
                    <p class="name">'.$of['login'].'</p>
                    <p>'.$of['content'].'</p>
                </div>';
				if (($of['sender'] != $user_one) AND ($of['num_unread'] != '0')) {
					echo '<p class="n_m">'.$of['num_unread'].'</p>';
				}
                
            echo '</div></a>
        ';
    }

/*for ($i = 0; $i< $rows; ++$i)
{
    $of = mysqli_fetch_array($sql_result);//преобразуем ответ из БД в нормальный массив PHP
    $names[] = $of['login'];
    $lm[] = $of['content'];
    $time[] = $of['date'];
    $sender[] = $of['sender'];
    $conversations[] = $of['convId'];
}*/

    /*
     *
     * SELECT
users.user_id as userId,
users.login,
dialogs.id_d as convId,
dialogs.sender,
dialogs.num_unread,
message.content,
message.date
FROM
`users`,
dialogs
LEFT JOIN
message ON (dialogs.last_message_id = message.id_message)
WHERE
(dialogs.first_user_id = "'.$user_one.'" OR dialogs.second_user_id = "'.$user_one.'")
AND
CASE
WHEN dialogs.first_user_id = "'.$user_one.'"
THEN dialogs.second_user_id = users.user_id AND dialogs.first_delete = "0"
WHEN dialogs.second_user_id = "'.$user_one.'"
THEN dialogs.first_user_id = users.user_id AND dialogs.second_delete = "0"
END
ORDER BY
dialogs.num_unread
DESC
     *
     * $sql_result = mysqli_query($link, "SELECT
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
    <?php foreach($all_dialogs as $dialogs): ?>

    <div class="m">
        <img src="img/mark.jpg">
        <div class="info">
            <p class="name"><?=$dialogs['login']?></p>
            <p>><?=$dialogs['content']?></p>
        </div>
        <p class="n_m">1</p>
    </div>
<?php endforeach;?>*/

    $all_dialogs = mysqli_fetch_all($sql_result, MYSQLI_ASSOC);

    return $all_dialogs;


?>



