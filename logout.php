<?php
session_start();

// Производим выход пользователя
unset($_SESSION['logged_user']);

// Редирект на главную страницу
header('Location: main_page.php');
?>