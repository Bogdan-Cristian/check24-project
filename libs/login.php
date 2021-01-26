<?php


namespace libs;


class login
{

    private $dbConnection;

    public function __construct( $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function login($params){
        $username = $params['username'];
        $password = $params['password'];

//        $sql = "SELECT * FROM user WHERE username = '${username}' AND password = '${password}'";
        $sql = sprintf("SELECT * FROM user WHERE username = '%s' AND password = '%s' ", $username, $password);
        $res = $this->dbConnection->query($sql);
        if($res->num_rows > 0)
        {
            $_SESSION["user_id"] = $res->fetch_all()[0][0];
            $_SESSION['logged'] = true;
        }
        header('Location: /');
    }


    public function validateData()
    {

    }
}