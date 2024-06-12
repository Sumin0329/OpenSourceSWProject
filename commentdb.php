<?php
$db = mysqli_connect('localhost', 'root', '') or die ('Unable to connect. Check your connection parameters.');
$query = 'CREATE DATABASE IF NOT EXISTS memberinfodb';

mysqli_query($db, $query) or die(mysqli_error($db)); //db에 연결

mysqli_select_db($db, 'memberinfodb') or die(mysqli_error($db)); //memberinfodb 데이터베이스를 선택

$query = 'CREATE TABLE IF NOT EXISTS comment (
    commentnum INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    commentcontent VARCHAR(255) NOT NULL,
    commentmembername VARCHAR(255) NOT NULL,
    postid INTEGER UNSIGNED NOT NULL,
    PRIMARY KEY (commentnum)
)
ENGINE=MyISAM';

mysqli_query($db, $query) or die(mysqli_error($db));
?>
