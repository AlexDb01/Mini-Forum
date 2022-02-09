<?php
require_once ('config.inc.php');
require_once ('ForumContent.class.php');
$content = new ForumContent();

if($content->delete($_POST['id'])){
    echo "done";
}else{
    echo "error";
};