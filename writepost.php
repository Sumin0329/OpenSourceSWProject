<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
?>

<html>
<head>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 500px;
            margin: 0;
        }

        .form-container {
            text-align: center;
            border: 1px solid gray;
            border-radius: 8px;
            width: 400px;
            padding: 20px;
            background-color: white;
        }

        .form-container p {
            margin: 10px 0;
        }

        .form-container input[type="text"],
        .form-container textarea,
        .form-container select {
            width: 400px;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid gray;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-container textarea {
            height: 100px;
            resize: none;
        }

        .form-container button {
            padding: 10px 20px;
            background-color: blue;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: lightblue;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>
    <h1>Write post</h1>
    <div class="form-container">
        <form method="post" action="./communitypostadd.php">
            <p>Enter Title</p>
            <input type="text" name="posttitle" />
            <p>Enter contents</p>
            <textarea name="postcontent"></textarea>
            <input type="hidden" name="postmembername" value="<?php echo $id; ?>" />
            <p><button type="submit">Submit</button></p>
        </form>
    </div>
</body>
</html>
