<?php

session_start();

$db = mysqli_connect('localhost', 'root', '') or die ('Unable to connect. Check your connection parameters.');
$query = 'CREATE DATABASE IF NOT EXISTS memberinfodb';

mysqli_query($db, $query) or die(mysqli_error($db)); //db에 연결

mysqli_select_db($db, 'memberinfodb') or die(mysqli_error($db)); //memberinfodb 데이터베이스를 선택
$newpass = $_POST['password'];
$id = $_POST['id'];
echo $newpass;
echo $id;

$query = 'DELETE
FROM memberinfo
WHERE memberid = "' . $id . '"';

mysqli_query($db, $query) or die(mysqli_error($db));

$query = 'INSERT INTO memberinfo 
    (memberid, memberpassword)
    VALUES
    ("'.$id.'","'.$newpass.'")';

mysqli_query($db, $query) or die(mysqli_error($db));

echo '<script type="text/javascript">';
echo 'alert("password change successfully!");';
echo 'window.location = "./mainpage.php";';
echo '</script>';

?>

