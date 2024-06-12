<?php
session_start();
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

$postid = $_GET['postnum'];
$posttitle = $_GET['posttitle'];
$postcontent = $_GET['postcontent'];
$memberid = $_GET['memberid'];

$db = mysqli_connect('localhost', 'root', '') or die('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'memberinfodb') or die(mysqli_error($db));

$query = 'SELECT postmembername FROM post WHERE postnum="'. $postid .'"';
$result = mysqli_query($db, $query) or die(mysqli_error($db));
$postAuthRow = mysqli_fetch_assoc($result);
$postmembername = $postAuthRow['postmembername'];
echo '<div class="back-link"><a href="./communitysite.php?id=' . $memberid . '">Back to Community Site</a></div>';
echo '<div class="post">';
echo '<h2> title : ' . $posttitle . '</h2>';
echo '<p>' . $postcontent . '</p>';
echo '</div>';

echo '<p> written my '. $postmembername . '</p>';
$query = 'SELECT commentcontent, commentmembername, postid FROM comment WHERE postid='.$postid.' ORDER BY commentnum';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

echo '<div class="comments">';
while ($row = mysqli_fetch_array($result)) {
    extract($row);
    echo '<div class="comment">';
    echo '<p>' . $commentcontent . ' - <span class="comment-author">' . $commentmembername . '</span></p>';
    echo '</div>';
}
echo '</div>';
?>

<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .back-link {
            margin: 20px 0;
        }

        .back-link a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }

        .post {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin: 20px;
            width: 60%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .post h2 {
            margin-top: 0;
        }

        .comments {
            width: 60%;
            margin: 20px 0;
        }

        .comment {
            background-color: #f1f1f1;
            border-radius: 8px;
            padding: 10px;
            margin: 10px 0;
        }

        .comment-author {
            font-weight: bold;
        }

        .form-container {
            width: 60%;
            margin: 20px 0;
            padding: 20px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-container p {
            margin: 10px 0;
        }

        .form-container input[type="text"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-container button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form method="post" action="./commentadd.php">
            <p>Enter comment</p>
            <input type="text" name="comment" />
            <input type="hidden" name="commentmembername" value="<?php echo $memberid; ?>" />
            <input type="hidden" name="postid" value="<?php echo $postid; ?>" />
            <input type="hidden" name="posttitle" value="<?php echo $posttitle; ?>" />
            <input type="hidden" name="postcontent" value="<?php echo $postcontent; ?>" />
            <input type="hidden" name="memberid" value="<?php echo $memberid; ?>" />
            <p><button type="submit">Submit</button></p>
        </form>
    </div>
</body>
</html>
