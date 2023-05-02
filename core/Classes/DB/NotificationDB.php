<?php

namespace core\Classes\DB;

use core\Database;


class NotificationDB
{

    private $dbref;
    function __construct()
    {
        $this->dbref = Database::getInstance();
    }

    public  function add($data)
    {

        $this->dbref->query(
            "INSERT INTO TABLE notification (sender_id,reciever_id,content,action) 
            
            values(:sender_id,:reciever_id,:contentt,:actionn)",
            [
                'sender_id' => $data['userId'],
                'reciever_id' => $data['title'],
                'contentt' => $data['content'],
                'actionn' => $data['img'],
            ]
        );
        return $this->dbref->getLastRecordIdAdded("notification");
    }
    public function delete($id)
    {
        $this->dbref->query(
            "DELETE FROM notification WHERE id=:id",
            [

                'id' => $id
            ]
        );
    }
    public function getAll()
    {

        return $this->dbref->query("SELECT * FROM notification INNER JOIN interaction on interaction.code = notification.id ")->get();
    }
    public function search($str, $offset, $limit)
    {
        return $this->dbref->query(
            "SELECT * FROM post WHERE title LIKE '%:str%' OR content like '%:str%' ORDER BY id desc  LIMIT :limit OFFSET :offset ",
            ['limit' => $limit, 'offset' => $offset, 'str' => $str]
        )->get();
    }
    public function getOne($id)
    {
        $notification = $this->dbref->query("SELECT * FROM notification WHERE id = :id", ['id' => $id])->findOrFail();
        if (empty($post)) {
            return [];
        }
        return $notification;
    }
}
