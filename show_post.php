<?php
require_once ('connection.php');

$link = mysqli_connect($host, $user, $password, $database, '3308')
or die("Ошибка " . mysqli_error($link));
mysqli_set_charset($link, "utf8");

function showNews() {
    global $link;
    $result_show_news = mysqli_query($link, "SELECT * FROM `posts` ORDER BY `post_id` DESC");
    $posts = mysqli_fetch_all($result_show_news, MYSQLI_ASSOC);

    return $posts;
}
function get_post_by_id($post_id) {
    global $link;
    $sql = mysqli_query($link, "SELECT * FROM `posts` WHERE `post_id` = ".$post_id);
    $post = mysqli_fetch_assoc($sql);

    return $post;
}
?>