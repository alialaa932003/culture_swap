<?php

namespace core\Classes;

use core\Database;


class Commentdb
{

    private $dbref;
    function __construct()
    {
        $this->dbref = Database::getInstance();
    }

    public function add($data)
    {

        $this->dbref->query(
            "INSERT INTO TABLE [comment] (user_id,[content],post_id) 
            
            values(:user_id,:contentt,:post_id)",
            [
                'user_id' => $data['userId'],
                'post_id' => $data['postId'],
                'contentt' => $data['content'],

            ]
        );
        return $this->dbref->getLastRecordIdAdded("comment");
    }
    public function delete($id)
    {
        $this->dbref->query(
            "DELETE FROM [comment] WHERE id=:id",
            [
                'id' => $id
            ]
        );
    }
    public function update($data)
    {
        extract($data);

        $this->dbref->query("UPDATE [comment] SET $key = :value WHERE id = :id ", [
            'value' => $value,
            'id' => $id
        ]);
    }
}
