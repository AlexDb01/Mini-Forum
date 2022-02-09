<?php
session_start();
require_once('config.inc.php');
if (!isset($_SESSION['loggedIn'])) {
    header("Location: login.php?error=3");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thread</title>
    <link rel="stylesheet" media="screen" href="styleThread.css" type="text/css"/>
    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $(".deleteMessage").click(function () {
            var me = $(this)
            var request = $.ajax({
                url: "ajaxMessage.php",
                method: "POST",
                data: {id: $(this).data('id')}
            });
            request.done(function (antwort) {
                if (antwort == "done") {
                    me.parent().remove();
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
    <?php
    $content = new ForumContent();
    foreach ($content->getThread() as $c):
    if ($_GET['thread'] == $c['threadID']):
    ?>
    <div id="title">
        <h1><?= $c['name'] ?></h1>
    </div>
    <div id="back">
        <form action="action.php" method="POST">
            <input type="submit" name="back" value="Go Back">
        </form>
    </div>
</div>
<div id="content">
    <div id="makeMessage">
        <form action="action.php" method="POST">
            New Message: <input type="text" name="messageContent" required>
            <input class="button" type="submit" name="newMessage" value="Send Message">
            <input type="hidden" name="id" value="<?= $c['threadID'] ?>">
            <input type="hidden" name="user" value="<?= $_SESSION['username'] ?>">
        </form
    </div>

        <?php foreach ($content->getMessage() as $cm):
        if ($c['threadID'] == $cm['threadID']): ?>
            <div id="message">

            <p>[<?= $cm['date'] ?>] - <?= $cm['name'] ?>
            : <?= $cm['message'] ?>  <?php if (isset($_SESSION['admin']) && $_SESSION['loggedIn'] == true): ?>
                <button class='deleteMessage' data-id='<?= $cm['messageID'] ?>'>Delete Message</button><?php endif; ?>
        </p>
    </div>
    <?php
    endif;
    endforeach;
    endif;
    endforeach;
    ?></div>
<script src="scriptThread.js"></script>
</body>
</html>
