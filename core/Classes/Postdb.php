<?php

namespace core\Classes;

use core\Database;


class Postdb
{
    // private $title;
    // private $content;
    // private $user;
    // // [id,name,type,country]
    // private $loves_num;
    // private $comments;
    // //[comment classes]
    // private $comments_num;
    // private $img;
    // private $date;
    private $dbref;
    function __construct()
    {
        $this->dbref = Database::getInstance();
    }

    public function add($data)
    {

        $this->dbref->query("");
    }
    public function delete($id)
    {
    }
    public function update($post)
    {
    }
    public function search($str, $skip, $limit)
    {
    }
    public function getOne($id)
    {
    }
}
