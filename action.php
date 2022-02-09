<?php
session_start();
require_once('config.inc.php');
require_once ('Authentication.class.php');
require_once ('ForumContent.class.php');

//--------------------------Login and Registration----------------------------------------------
$auth = new Authentication();

if(isset($_POST['login'])){
    $enterForum = $auth->login($_POST['username'], $_POST['password']);

    if($enterForum){
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $_POST['username'];
        header("Location:forum.php");
    }else{
        unset($_SESSION['loggedIn']);
        header("Location: login.php?error=1");
    }

    if($_POST['username'] == "Admin"){
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['admin'] = true;
        header("Location:forum.php");
    }else{
        unset ($_SESSION['admin']);
    }
}


if(isset($_POST['register'])){
    if($auth->registerCheck($_POST['username']) == true){
        $auth->register($_POST['username'], $_POST['password']);
        $_SESSION['registered'] = true;
        header("Location: login.php?registered=true");
    }else if($auth->registerCheck($_POST['username']) == false){
        unset ($_SESSION['registered']);
        header("Location: login.php?error=2");
    }
}

//-------------------------------Forum--------------------------------------------------------------
$content = new ForumContent();

if(isset($_POST['newThread'])){
    $content->createThread($_POST['threadName']);
    header("Location:forum.php");
}

if(isset($_POST['newMessage'])){
    $content->createMessage($_POST['user'], $_POST['messageContent'], $_POST['id']);
    header("Location:thread.php?thread=".$_POST['id']);
}

if(isset($_POST['logOut'])){
    unset($_SESSION['loggedIn']);
    header("Location:login.php");
}

if(isset($_POST['back'])){
    header("Location:forum.php");
}https://bs-baumservice.at/beispiel-kategorie-beitraege/