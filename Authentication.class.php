<?php


class Authentication
{
    private $db;

    function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PW);
        } catch (PDOException $e) {
            echo "Connection Failed";
            die();
        }
    }

    public function getUser()
    {
        $statement = $this->db->prepare("SELECT username, password FROM ForumUser");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

     function login($user, $password)
    {
        foreach ($this->getUser() as $a) {
            if ($a['username'] == $user && $a['password'] == $password) {
                return true;
            }
        }
        return false;
    }


    public function registerCheck($user){
        foreach ($this->getUser()  as $a) {
            if ($a['username'] == $user) {
                return false;
            }
        }
        return true;
    }

    public function register($user, $password){
        $statement = $this->db->prepare("INSERT INTO ForumUser (username, password) VALUES (:username, :password)");
        $statement->bindValue(":username", $user);
        $statement->bindValue(":password", $password);
        $statement->execute();
    }
}