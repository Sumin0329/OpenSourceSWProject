<?php
session_start();

$id = $_GET['id'];

$db = mysqli_connect('localhost', 'root', '') or
die ('Unable to connect. Check your connection parameters.');

mysqli_select_db($db, 'memberinfodb') or die(mysqli_error($db));

?>

<!DOCTYPE html>
<html>
<head>
<title>User Infomation</title>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    form {
        border: 1px solid gray;
        padding: 20px;
        width: 300px;
    }

    input[type="password"], input[type="submit"] {
        width: 280px;
        padding: 10px;
        margin-top: 10px;
    }

    input[type="submit"] {
        background-color: green;
        color: white;
        border: none;
    }

    input[type="submit"]:hover {
        background-color: lightgreen;
    }

    .post-link {
    display: block;
    margin: 3px 0;
    padding: 10px;
    text-decoration: none;
    color: black;
    width:400px;
    background-color: white;
    text-align: center;
    }

    .post-link:hover {
    background-color:lightgray;
    }

    #changepass {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }

    #changepass:hover {
        background-color: #45a049;
    }
    

</style>

<script>

    window.onload = function() {
        hidepass();
    };

    function hidepass () {
        let form = document.getElementById('changepassword');
        form.style.display = 'none';
    }

    function changepass () {
        let form = document.getElementById('changepassword');
        if (form.style.display === 'none') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    }

    function checkpass() {
        let password = document.getElementById('newpassword').value;
        let confirmPassword = document.getElementById('confirmpassword').value;
        if (password !== confirmPassword) {
            alert("Passwords do not match.");
            return false; // Prevent the form from submitting
        }
        return true; // Allow form submission
    }

</script>

</head>
<body>
    <?php
    echo '<div class="back-link"><a href="./communitysite.php?id=' . $id . '">Back to Community Site</a></div>';
    ?>
    <h2>User Info <?php echo $id ?></h2>
    <button id="changepass" onclick="changepass()">Change Password</button>
    <form id="changepassword" method="post" action="./database/changememberinfo.php" onsubmit="return checkpass();">
        <input type="hidden" name="id" value="<?php echo $id ?>" />
        <div>
            <label for="new-password">New Password:</label>
            <input type="password" id="newpassword" name="password" required>
        </div>
        <div>
            <label for="current-password">Re-enter Password:</label>
            <input type="password" id="confirmpassword" name="confirmpassword" required>
        </div>
        <div>
            <input type="submit" value="Change Password">
        </div>
    </form>
    <?php
    $db = mysqli_connect('localhost', 'root', '') or die ('Unable to connect. Check your connection parameters.');
    $query = 'CREATE DATABASE IF NOT EXISTS memberinfodb';
    mysqli_query($db, $query) or die(mysqli_error($db)); //db에 연결

    mysqli_select_db($db, 'memberinfodb') or die(mysqli_error($db)); //memberinfodb 데이터베이스를 선택
    
    $query = 'SELECT posttitle, postcontent, postnum
    FROM post
    WHERE postmembername="'. $id .'"';
    
    $result = mysqli_query($db,$query) or die(mysqli_error($db));
    
    echo '<h1>My post history</h1>';
    while ($row = mysqli_fetch_array($result)) {
        extract($row);
        echo '<a href="./post.php?postnum=' . $postnum . '&posttitle=' . $posttitle . '&postcontent=' . $postcontent . '&memberid=' . $id . '" class="post-link">';
        echo $posttitle .'<br/>';
        echo '</a>';
    }
    ?>
</body>
</html>
