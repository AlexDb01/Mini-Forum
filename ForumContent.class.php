<?php


class ForumContent
{
    private $db;

    function __construct(){
        try {
            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PW);
        } catch (PDOException $e) {
            echo "Connection Failed";
            die();
        }
    }

    public function createThread($name){
        $statement = $this->db->prepare("INSERT INTO ForumThreads (name) VALUES (:name)");
        $statement->bindValue(":name",$name);
        $statement->execute();
    }

    public function getThread(){
        $statement = $this->db->prepare("SELECT * FROM ForumThreads ORDER BY threadID DESC");
        $statement -> execute();
        $result = $statement->fetchAll();
        return $result;
    }

    public function createMessage($name, $message, $threadID){
        $statement = $this->db->prepare("INSERT INTO ForumMessages (name, message, threadID) VALUES (:name, :message, :threadID)");
        $statement->bindValue(":name",$name);
        $statement->bindValue(":message",$message);
        $statement->bindValue(":threadID",$threadID);
        $statement->execute();
    }


    public function getMessage(){
        $statement = $this->db->prepare("SELECT * FROM ForumMessages ORDER BY messageID DESC");
        $statement -> execute();
        $result = $statement->fetchAll();
        return $result;
    }

    public function delete($threadID){
        $statement = $this->db->prepare("DELETE FROM ForumThreads WHERE threadID = :threadID; DELETE FROM ForumMessages where threadID = :threadID");
        $statement->bindValue(":threadID",$threadID);
        if($statement->execute()){
            return true;
        }else {
            print_r($statement->errorInfo());
            return false;
        }
    }

    public function deleteMessage($messageID){
        $statement = $this->db->prepare("DELETE FROM ForumMessages WHERE messageID = :messageID ");
        $statement->bindValue(":messageID", $messageID);
        if($statement->execute()){
            return true;
        }else {
            print_r($statement->errorInfo());
            return false;
        }
    }

    public function updateMessage($message)
    {
        $statement = $this->db->prepare("UPDATE ForumMessages SET message WHERE message = :message");
        $statement->bindValue(":message, $message");
        if ($statement->execute()) {
            return true;
        } else {
            print_r($statement->errorInfo());
            return false;

        }
    }

}