<?php

namespace core\Classes\DB;

use core\Database;

class user{

    function __construct()
    {
    }

    public static function cheick($email){

        $dbref =  Database::getInstance();
        $user=$dbref->query("SELECT  _user.* from  _user where email= :email  ",['email'=>$email,])->find();
        return $user;
    }

}
