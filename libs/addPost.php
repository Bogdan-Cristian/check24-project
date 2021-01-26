<?php


namespace libs;


class addPost
{

    private $dbConnection;

    public function __construct($dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function addPost($params){
        $title = $params['title'];
        $description = $params['description'];
        $imageLink = $params['imageLink'];

//        $sql = "SELECT * FROM user WHERE username = '${username}' AND password = '${password}'";
        $sql = sprintf("INSERT INTO posts (title, description, user_id, added_at, image_link) VALUES ('%s', '%s', '%s', '%d', '%s')", $title, $description, $_SESSION['user_id'], time(), $imageLink);
        $res = $this->dbConnection->query($sql);
        header("Location: /");

    }


    public function validateData()
    {

    }
}