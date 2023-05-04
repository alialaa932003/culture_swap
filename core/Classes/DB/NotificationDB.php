<?php

namespace core\Classes\DB;

use core\Database;


class NotificationDB
{


    function __construct()
    {
    }

    public  function add($data)
    {

        Database::getInstance()->query(
            "INSERT INTO  notification (sender_id,reciever_id,content,action) 
            
            values(:sender_id,:reciever_id,:content,:action)",
            [
                'sender_id' => $data['sender_id'],
                'reciever_id' => $data['reciever_id'],
                'content' => $data['content'],
                'action' => $data['action'],//action id
            ]
        );
        return Database::getInstance()->getLastRecordIdAdded("notification");
    }

    
    public static function delete($id, $user_id)
    {
        Database::getInstance()->query(
            "DELETE FROM notification WHERE id=:id AND  reciever_id = :user_id",
            [
                'user_id' => $user_id,
                'id' => $id
            ],

        );
    }
    public static  function getAll($user_id)
    {

        return Database::getInstance()->query("SELECT * FROM notification INNER JOIN interaction on interaction.code = notification.id WHERE reciever_id = :user_id ", ['user_id' => $user_id])->get();
    }

    public static function  getOne($id, $user_id)
    {
        $notification = Database::getInstance()->query("SELECT * FROM notification INNER JOIN interaction on interaction.code = notification.id  WHERE notification.id = :id AND  reciever_id = :user_id", [
            'user_id' => $user_id,
            'id' => $id
        ],)->findOrFail();
        if (empty($notification)) {
            return [];
        }
        return $notification;
    }
}
