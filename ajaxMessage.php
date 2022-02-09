<?php

require_once('config.inc.php');
require_once('ForumContent.class.php');
$content = new ForumContent();

if ($content->deleteMessage($_POST['id'])) {
    echo "done";
} else {
    echo "error";
};