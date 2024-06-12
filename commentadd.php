<?php
session_start();


$commentcontent = $_POST['comment'];
$commentmembername =  $_POST['commentmembername'];
$postid = $_POST['postid'];
$posttitle = $_POST['posttitle'];
$postcontent = $_POST['postcontent'];
$memberid = $_POST['memberid'];
echo $postid;
$db = mysqli_connect('localhost', 'root', '') or die ('Unable to connect. Check your connection parameters.');
$query = 'CREATE DATABASE IF NOT EXISTS memberinfodb';

mysqli_query($db, $query) or die(mysqli_error($db)); //db에 연결

mysqli_select_db($db, 'memberinfodb') or die(mysqli_error($db)); //memberinfodb 데이터베이스를 선택

$query = 'INSERT INTO comment
    (commentcontent, commentmembername, postid)
    VALUES
    ("'.$commentcontent.'","'.$commentmembername.'", '.$postid.')';

mysqli_query($db, $query) or die(mysqli_error($db));

echo '<script type="text/javascript">';
echo 'window.location = "./post.php?postnum=' . $postid . '&posttitle=' . $posttitle . '&postcontent=' . $postcontent . '&memberid=' . $memberid . '";';
echo '</script>';

?>
