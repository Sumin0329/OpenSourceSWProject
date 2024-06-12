<?php
session_start();

$id = $_GET['id'];

$db = mysqli_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');

mysqli_select_db($db, 'memberinfodb') or die(mysqli_error($db));

?>
<html>
<head>
<style>

    body {
    display: flex;
    margin: 40px;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    text-align: center;
    }

    .post-link {
    display: block;
    margin: 3px 0;
    padding: 10px;
    text-decoration: none;
    color: black;
    width:400px;
    background-color: white;
    }

    .post-link:hover {
    background-color:lightgray;
    }

    .header {
        width: 100%;
        display: flex;
        justify-content: flex-end;
        margin-bottom: 20px;
    }

    .head {
        width: 100%;
        text-align: center;
        margin-top: 20px;
    }

    .edit {
        display: inline-block;
        background-color: blue;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 8px;
        margin-top: 10px;
    }

    .write {
        display: inline-block;
        background-color: green;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 8px;
        margin-top: 10px;
    }

    .logout {
        display: inline-block;
        background-color: red;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 8px;
        margin-top: 10px;
    }

    .title {
        float: left;
    }

    .writer {
        float: right;
    }

    input[type="text"] {
        width: 400px;
        padding: 10px;
        margin: 5px 0;
        border: 1px solid gray;
        border-radius: 4px;
        box-sizing: border-box;
    }
    
</style>
</head>
<body>
<div class="head">
    Hello, <?php echo $id?> 
</div>  
<div class="header">
    <a href="./mainpage.php" class="logout" style="margin-right:20px;">Log out</a>
    <a href="./writepost.php?id=<?php echo $id?>" class="write" style="margin-right:20px;">Write Post</a>
    <a href="./modifyuser.php?id=<?php echo $id?>" class="edit">Edit Profile</a>
</div>

<div>
    <h1>Recent Post</h1>
</div>
<?php

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

$query = 'SELECT posttitle, postmembername, postnum, postcontent
FROM post
ORDER BY postnum DESC
';

$result = mysqli_query($db,$query) or die(mysqli_error($db));

while ($row = mysqli_fetch_array($result)) {
    extract($row);
    echo '<a href="./post.php?postnum=' . $postnum . '&posttitle=' . $posttitle . '&postcontent=' . $postcontent . '&memberid=' . $id . '" class="post-link">';
    echo '<span class="title">' . $posttitle . '</span>';
    echo '<span class="writer">' . $postmembername . '</span>';
    echo '</a>';
    }
?>
</body>
</html>
