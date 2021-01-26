<?php

namespace libs;

class ControlSession
{
    protected $errors;

    // adds or modifies a key in Session
    public function addKey($params)
    {
        if(is_array($params))
        {
            foreach($params as $key => $val)
            {
                $_SESSION[$key] = $val;
            }
        }
    }

    // Returns the entire Session
    public function info()
    {
        return $_SESSION;
    }

    // Return if the user is logged in or not
    public function isLogged()
    {
        if(isset($_SESSION["logged"]) AND ($_SESSION["logged"] == true))
        {
            return true;
        }
        return false;
    }


//    Errors
    public function getErrors($page)
    {
        if(isset($this->errors[$page]))
        {
            return $this->errors[$page];
        }
        return false;
    }

    public function registerError($error)
    {
        if(is_array($error))
        {
            foreach($error as $key => $errorArray)
            {
                if(isset($this->errors[$key]))
                {
                    foreach($errorArray as $errorMessage)
                    {
                        array_push($this->errors, $errorMessage);
                    }
                } else {
                    array_push($this->errors, $errorArray);
                }
            }
        }

    }


}
