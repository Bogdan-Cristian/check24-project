<?php


namespace libs;


class login
{
    private $userSession;

    private $dbConnection;

    public function __construct($userSession = null , $dbConnection)
    {
        $this->userSession = $userSession;
        $this->dbConnection = $dbConnection;
    }

    public function login($params){
        $username = $params['username'];
        $password = $params['password'];

        $sql = "SELECT * FROM user WHERE username = '${username}' AND password = '${password}'";
        $res = $this->dbConnection->query($sql);
        if($res->num_rows > 0)
        {
            $_SESSION['logged'] = true;
            header('Location: /');
        }

    }
}