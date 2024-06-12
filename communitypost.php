<?php
session_start();
$db = mysqli_connect('localhost', 'root', '') or die ('Unable to connect. Check your connection parameters.');
$query = 'CREATE DATABASE IF NOT EXISTS communitypost';

mysqli_query($db, $query) or die(mysqli_error($db)); //db에 연결

mysqli_select_db($db, 'memberinfodb') or die(mysqli_error($db)); //memberinfodb 데이터베이스를 선택

$query = 'CREATE TABLE IF NOT EXISTS post (
    postnum INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    posttitle VARCHAR(255) NOT NULL,
    postcontent VARCHAR(255) NOT NULL,
    postmemberid INTEGER NULL,
    postmembername VARCHAR(255),
    comment INTEGER UNSIGNED NOT NULL,
    PRIMARY KEY (postnum)
)
ENGINE=MyISAM';

mysqli_query($db, $query) or die(mysqli_error($db));
?>
