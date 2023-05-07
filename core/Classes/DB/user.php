<?php

namespace core\Classes\DB;

use core\Database;

class user{

    function __construct()
    {
    }

    public static function cheick($username,$password){

        $dbref =  Database::getInstance();
        $user=$dbref->query("select * from _user where email='$username' and password ='$password'");
        return $user;
    }

}