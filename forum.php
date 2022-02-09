<?php session_start();
require_once("config.inc.php");
if (!isset($_SESSION['loggedIn'])) {
    header("Location: login.php?error=3");
}
$username = $_SESSION['username'];
?>
    <!doctype html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forum</title>
    <link rel="stylesheet" media="screen" href="styleForum.css" type="text/css"/>
    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $(".delete").click(function () {
            var me = $(this)
            var request = $.ajax({
                url: "ajax.php",
                method: "POST",
                data: {id: $(this).data('id')}
            });
            request.done(function (antwort) {
                if (antwort == "done") {
                    me.parent().parent().remove();
                }
            });
        });
    });
</script>
<body>
<video autoplay muted loop id="myVideo">
    <source src="data/NightCity.mp4" type="video/mp4">
</video>
<div id="box"></div>
<div id="header">
    <div id="welcome">
        <h1>Welcome, <?= $username; ?></h1>
    </div>
    <div id="logout">
        <form action="action.php" method="POST">
            <input type="submit" name="logOut" value="Log Out">
        </form>
    </div>
</div>
<div id="contentForum">
    <div id="makeThread">
        <form action="action.php" method="POST">
            Create New Topic: <input type="text" name="threadName" required>
            <input class=button type="submit" name="newThread" value="Submit">
        </form>
    </div>
    <?php
    $content = new ForumContent();
    foreach ($content->getThread() as $c):
        ?>
        <div id="thread">
            <h3>
                <a class="threadLinks" href="thread.php?thread=<?= $c['threadID'] ?>"><?= $c['name'] ?></a>
                <?php
                if (isset($_SESSION['admin']) && $_SESSION['loggedIn'] == true) {
                    echo "<button class='delete' data-id='" . $c['threadID'] . "'>Delete Thread</button>";
                }
                ?>
            </h3>
        </div>
    <?php endforeach; ?>
</div>
<script src="scriptForum.js"></script>
</body>
    </html><?php