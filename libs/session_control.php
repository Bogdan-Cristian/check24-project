<?php

namespace libs;

class session_control
{


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

}
