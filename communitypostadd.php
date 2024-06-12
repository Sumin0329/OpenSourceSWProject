
<?php
session_start();

$posttitle = $_POST['posttitle'];
$postcontent =  $_POST['postcontent'];
$id = $_POST['postmembername'];
echo $id;
$db = mysqli_connect('localhost', 'root', '') or die ('Unable to connect. Check your connection parameters.');
$query = 'CREATE DATABASE IF NOT EXISTS memberinfodb';

mysqli_query($db, $query) or die(mysqli_error($db)); //db에 연결

mysqli_select_db($db, 'memberinfodb') or die(mysqli_error($db)); //memberinfodb 데이터베이스를 선택

$query = 'INSERT INTO post 
    (posttitle, postcontent, postmembername)
    VALUES
    ("'.$posttitle.'","'.$postcontent.'","'.$id.'")';

mysqli_query($db, $query) or die(mysqli_error($db));
echo '<script type="text/javascript">';
echo 'window.location = "../communitysite.php?id=' . $id . '";';
echo '</script>';
?>
