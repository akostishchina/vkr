<?php

require_once ('connection.php');

$link = mysqli_connect('localhost', 'root', '', 'myvkr', '3308')
or die("Ошибка подключения к бд" . mysqli_error($link));
mysqli_set_charset($link, "utf8");

$user_one = $_SESSION['id'];

$query = "SELECT `id_help`, DATE_FORMAT(`date`, '%d.%m') as `new_date`,`title_cal`, `priority` FROM `calendar` WHERE (`needing_id` = '" . $user_one . "' OR `helper_id` = '" . $user_one . "') AND (`date` = CURRENT_DATE())
ORDER BY `priority` ASC";
$sql_result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

$rows = mysqli_num_rows($sql_result);
if ($rows == 0) {
    echo'<p>На сегодня планов нет</p>';
}
for ($i = 0; $i< $rows; ++$i) {

    $of = mysqli_fetch_array($sql_result);

    if ($of['priority'] == '1') {
        //echo'<p class="high" tabindex="0">'. $of['new_date']. $of['title_cal'] . '</p>';
//<a href="me.php?plan_id=' . $of['id_help'] . '">
        echo'<a href="me.php?plan_id=' . $of['id_help'] . '">
            <p class="high" tabindex="0">'. $of['title_cal'] . '</p></a>';
    } elseif ($of['priority'] == '2') {
        echo'<a href="me.php?plan_id=' . $of['id_help'] . '">
            <p class="middle" tabindex="0">' . $of['title_cal'] . '</p></a>';

    }else {
        echo'<a href="me.php?plan_id=' . $of['id_help'] . '">
        <p class="low" tabindex="0">' . $of['title_cal'] . '</p></a>';

    }

}

?>



