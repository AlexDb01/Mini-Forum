<?php session_start(); ?>
    <!doctype html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" media="screen" href="styleLogin.css" type="text/css"/>
    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
</head>
<body>
<body>
<video autoplay muted loop id="myVideo">
    <source src="data/NightCity.mp4" type="video/mp4">
</video>
<div id="box"></div>
<div id="title">
    <div id="welcome">
        <h2>Welcome to the unofficial</h2>
    </div>
    <div id="neuromancer">
        <h1>Neuromancer - Forum</h1>
    </div>
</div>
<div id="forms">
    <div id="loginArea">
        <h2>LOGIN HERE</h2>
        <form action="action.php" method="POST">
            Username: <br><input type="text" name="username" required><br>
            Password: <br><input type="password" name="password" required>
            <br><input class="button" type="submit" name="login" value="LOGIN">
        </form>

    </div>
    <div id="registerArea">
        <h2>REGISTER HERE</h2>
        <form action="action.php" method="POST">
            Username: <br><input type="text" name="username" required><br>
            Password: <br><input type="password" name="password" required minlength="6">
            <br><input class="button" type="submit" name="register" value="REGISTER">
        </form>
        <?php
        if ($_GET['registered'] == true) {
            echo "registration succesfull";
        }

        if ($_GET['error'] == 2){echo "<h3 class='errorAlert'>This username already exists</h3>";} elseif ($_GET['error'] == 1){echo "<h3 class='errorAlert'>Wrong username or password</h3>";};
        ?>
    </div>
</div>
<script src="scriptLogin.js"></script>
</body>
    </html><?php
