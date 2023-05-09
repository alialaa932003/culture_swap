<?php

namespace core\Classes;

use core\Classes\DB\PostDB;



class Post
{

    //data fields

    private $id;
    private $user_id;
    private $content;
    private $title;
    private $img;
    private $love_num;
    private $date;


    public function __construct()
    {
        // Empty constructor
    }

    public function add($data)
    {
        $id = PostDB::add($data);
        extract($data);
        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->content = $content;
        $this->img = $img;
        $this->love_num = $love_num;
        $this->date = $date;
    }

    public static function delete($id, $user_id)
    {
        PostDB::delete($id, $user_id);
    }

    public function setContent($content)
    {
        PostDB::update($this->id, 'content', $content);

        $this->content = $content;
    }




    public function setTitle($title)
    {
        PostDB::update($this->id, 'title', $title);

        $this->title = $title;
    }




    public function setImg($img)
    {
        PostDB::update($this->id, 'img', $img);

        $this->img = $img;
    }


    public function setLoveNum($love_num)
    {
        PostDB::update($this->id, 'love_num', $love_num);

        $this->love_num = $love_num;
    }


    private function CalculatePostTime()
    {
        $current_time = time();
        $date_time = date("Y-m-d H:i:s", $current_time);
        return $date_time;
    }


    public function setdate($date)
    {
        PostDB::update($this->id, 'date', $date);

        $date = $this->CalculatePostTime();

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


    public function getTitle()
    {
        return $this->title;
    }

    public function getImg()
    {
        return $this->img;
    }


    public function getLoveNum()
    {
        return $this->love_num;
    }


    public function getDate()
    {
        return $this->date;
    }


    public function getOne($id)
    {
        $post = PostDB::getOne($id);
        extract($post);
        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->content = $content;
        $this->img = $img;
        $this->love_num = $love_num;
        $this->date = $date;

        return $post;
    }


    public static function search($str, $offset = 0, $limit = 3)
    {
        return PostDB::search($str, $offset, $limit);
    }
    public static function count_posts($searchQuery)
    {
        return PostDB::count_posts($searchQuery);
    }
    public static function get_user_loves($id)
    {
        return PostDB::get_user_loves($id);
    }
    public static function get_loves_num($post_id)
    {
        return PostDB::get_loves_num($post_id);
    }
    public static function makeLove($user_id, $post_id)
    {
        $val = PostDB::checkLove($user_id, $post_id);
        if (!empty($val)) {
            PostDB::removeLove($user_id, $post_id);
            return;
        }
        PostDB::makeLove($user_id, $post_id);
    }
}
