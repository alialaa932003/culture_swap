<?php

namespace core\Classes\DB;

use core\Database;


class PostDB
{


    function __construct()
    {
    }

    public  function add($data)
    {

        Database::getInstance()->query(
            "INSERT INTO  post (user_id,title,content,img) 
            
            values(:user_id,:title,:content,:img)",
            [
                'user_id' => $data['user_id'],
                'title' => $data['title'],
                'content' => $data['content'],
                'img' => $data['img'],
            ]
        );
        return Database::getInstance()->getLastRecordIdAdded("post");
    }
    public static function delete($id)
    {
        Database::getInstance()->query(
            "DELETE FROM post WHERE id=:id",
            [
                'id' => $id
            ]
        );
    }
    public static function update($data)
    {
        extract($data);

        Database::getInstance()->query("UPDATE post SET $key = :value WHERE id = :id ", [
            'value' => $value,
            'id' => $id
        ]);
    }
    public static function search($str, $offset, $limit)
    {
        return Database::getInstance()->query(
            "SELECT * FROM post WHERE title LIKE '%:str%' OR content like '%:str%' ORDER BY id desc  LIMIT :limit OFFSET :offset ",
            ['limit' => $limit, 'offset' => $offset, 'str' => $str]
        )->get();
    }
    public static function  getOne($id)
    {
        $post = Database::getInstance()->query("SELECT * FROM post WHERE id = :id", ['id' => $id])->find();
        if (empty($post)) {
            return [];
        }
        $comments = Database::getInstance()->query("SELECT comment.* ,first_name,last_name ,country,profile_img,type FROM comment INNER JOIN _user on _user.id = comment.user_id  WHERE  post_id = :id ", ['id' => $id])->find();
        $post['comments'] = $comments;
        return $post;
    }
}
