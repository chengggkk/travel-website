
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
    <style>
        form {
            background-color: white;
            color: black;
            width: 400px;
            height: 800px;
            padding: 15px;
            margin: 0 auto;
            box-shadow: 0px 0px 10px 0px black;
            position: absolute;
            top: 46%;
            left:81%;
            transform: translate(-50%, -50%);
        }
        button {
            width: 100px;
            height: 50px;
            background-color: black;
            color: white;
        }
        .button {

            width: 100px;
            height: 50px;
            background-color: black;
            color: white;
        }
        img{
            position: absolute;
            top: 0;
            left: 0;
            width: auto;
            height: 800px;
            object-fit: cover;
            z-index: -1;
            margin-top: 100px;
            margin-left: 100px;
        }
    </style>
</head>
<body>
    <img src="img/taipei.jpg" alt="">
    <form action="process_login.php" method="post">
        <div  align="center">

        <div style="margin-top: 300px;">        
        <h2 style="margin-bottom: 30px;">Login</h2>
        <label for="address"  style="margin-right: 15px;">Address:</label>
        <input type="text" id="address" name="address"><br>
        <div style="margin-top: 30px;">
        <label for="password" style="margin-right: 5px;">Password:</label>
        <input type="password" id="password" name="password"><br>
        </div>
        <?php
// login.php

session_start();

if (isset($_SESSION['message'])) {
    // Display the message
    echo "<div class='{$_SESSION['msg_type']}' style='color: red;'>{$_SESSION['message']}</div>";

    // Unset the message
    unset($_SESSION['message']);
    unset($_SESSION['msg_type']);
}

?>
        </div>
        <div style="margin-top: 50px;">
        <button onclick="window.location.href='register.php'">Register</button>
        <input class="button" type="submit" value="Submit">
</div>
    </form>
</body>
</html>