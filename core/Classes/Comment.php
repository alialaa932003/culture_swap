<?php

namespace core\Classes;

use core\Classes\DB\CommentDB;



class Comment
{

    //data fields

    private $id;
    private $user_id;
    private $content;
    private $post_id;
    private $date;


    public function __construct()
    {
        // Empty constructor
    }

    public function add($data)
    {
        $id = CommentDB::add($data);
        extract($data);
        $this->id = $id;
        $this->user_id = $user_id;
        $this->content = $content;
        $this->post_id = $post_id;
        $this->date = $date;
    }

    public static function delete($id)
    {
        CommentDB::delete($id);
    }

    public function setContent($content)
    {
        CommentDB::update(['id' => $this->id, 'key' => 'content', 'value' => $content]);

        $this->content = $content;
    }



    private function CalculateCommentTime()
    {
        $current_time = time();
        $date_time = date("Y-m-d H:i:s", $current_time);
        return $date_time;
    }


    public function setdate($date)
    {
        CommentDB::update(['id' => $this->id, 'key' => 'date', 'value' => $date]);

        $date = $this->CalculateCommentTime();

        $this->date = $date;
    }



    public function getId()
    {
        return $this->id;
    }


    public function getUserId()
    {
        return $this->user_id;
    }


    public function getContent()
    {
        return $this->content;
    }



    public function getDate()
    {
        return $this->date;
    }

    public static function recentComments($limit)
    {

        return CommentDB::recentComments($limit);
    }
}
