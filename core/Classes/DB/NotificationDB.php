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
                'action' => $data['action'],
            ]
        );
        return Database::getInstance()->getLastRecordIdAdded("notification");
    }
    public static function delete($id)
    {
        Database::getInstance()->query(
            "DELETE FROM notification WHERE id=:id",
            [

                'id' => $id
            ]
        );
    }
    public static  function getAll()
    {

        return Database::getInstance()->query("SELECT * FROM notification INNER JOIN interaction on interaction.code = notification.id ")->get();
    }

    public static function  getOne($id)
    {
        $notification = Database::getInstance()->query("SELECT * FROM notification INNER JOIN interaction on interaction.code = notification.id  WHERE notification.id = :id", ['id' => $id])->findOrFail();
        if (empty($notification)) {
            return [];
        }
        return $notification;
    }
}
