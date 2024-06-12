
<?php
session_start();
?>
<html>
    <head>
        <style>
            input {
            width: 400px;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid gray;
            border-radius: 4px;
            box-sizing: border-box;
            }

            input:hover {
                background-color : lightblue;
            }
        </style>
        <script>
            function checkpass() {
        let password = document.getElementById('pass').value;
        let confirmPassword = document.getElementById('repass').value;
        if (password !== confirmPassword) {
            alert("Passwords do not match.");
            return false; // Prevent the form from submittings
        }
        return true; // Allow form submission
    }
        </script>
    </head>
    <body>
        <h1 style="margin-left:700px;">Sign up</h1>
        <div style=
        "display: flex;
        justify-content: center;
        align-items: center;">
        <div style=
        "border: 1px solid gray;
        width: 440px;">
        <form method="post" action="./memberinfoadd.php" style="margin-left:20px;" onsubmit="return checkpass();">
        <p>Enter username:
            <input type="text" name="user" />
        </p>
        <p>Enter password:
            <input type="password" name="pass" id="pass"/>
        </p>
        <p>Re-password
            <input type="password" name="repass" id="repass"/>
        </p>
        <input type="submit" value="submit" style="background-color:lightblue;"/>
        </form>
        </div>
</div>
    </body>
</html>
