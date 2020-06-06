<?php
//db details
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'myvkr';

//Connect and select the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName,'3308');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>

