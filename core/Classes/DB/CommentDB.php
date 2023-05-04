<?php

namespace core\Classes\DB;

use core\Database;


class CommentDB
{


    function __construct()
    {
    }

    public function add($data)
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

    // function get post id 
}
