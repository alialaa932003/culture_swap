<?php

namespace core\Classes\DB;

use core\Database;


class CommentDB
{


    function __construct()
    {
    }

    public static function add($data)
    {
        extract($data);
        Database::getInstance()->query(
            "INSERT INTO  comment (user_id,content,post_id) 
            
            values(:user_id,:content,:post_id)",
            [
                'user_id' => $user_id,
                'post_id' => $post_id,
                'content' => $content,

            ]
        );
        return Database::getInstance()->getLastRecordIdAdded("comment");
    }
    public static function delete($id)
    {
        Database::getInstance()->query(
            "DELETE FROM comment WHERE id=:id",
            [
                'id' => $id
            ]
        );
        return true;
    }
    public static function update($data)
    {
        extract($data);

        Database::getInstance()->query("UPDATE comment SET $key = :value WHERE id = :id ", [
            'value' => $value,
            'id' => $id
        ]);
        return $id;
    }
    public static function recentComments($limit)
    {

        return Database::getInstance()->query("SELECT * from comment ORDER BY id desc LIMIT $limit  ")->get();
    }

    public static function getUserCommentsNum($id)
    {
        return Database::getInstance()->query(
            "SELECT COUNT(id) from comment WHERE user_id = :id",
            [':id' => $id]
        )->get();
    }
}
