<?php

namespace core\Classes;

use core\Database;


class Postdb
{

    private $dbref;
    function __construct()
    {
        $this->dbref = Database::getInstance();
    }

    public  function add($data)
    {

        $this->dbref->query(
            "INSERT INTO TABLE post (user_id,title,[content],img) 
            
            values(:user_id,:title,:contentt,:img)",
            [
                'user_id' => $data['userId'],
                'title' => $data['title'],
                'contentt' => $data['content'],
                'img' => $data['img'],
            ]
        );
        return $this->dbref->getLastRecordIdAdded("post");
    }
    public function delete($id)
    {
        $this->dbref->query(
            "DELETE FROM post WHERE id=:id",
            [
                'id' => $id
            ]
        );
    }
    public function update($data)
    {
        extract($data);

        $this->dbref->query("UPDATE post SET $key = :value WHERE id = :id ", [
            'value' => $value,
            'id' => $id
        ]);
    }
    public function search($str, $offset, $limit)
    {
        return $this->dbref->query(
            "SELECT * FROM post WHERE title LIKE '%:str%' OR [content] like '%:str%' ORDER BY id desc  LIMIT :limit OFFSET :offset ",
            ['limit' => $limit, 'offset' => $offset, 'str' => $str]
        )->get();
    }
    public function getOne($id)
    {
        $post = $this->dbref->query("SELECT * FROM post WHERE id = :id", ['id' => $id])->findOrFail();
        if (empty($post)) {
            return [];
        }
        $comments = $this->dbref->query("SELECT [comment].* ,first_name,last_name ,country,profile_picture,type FROM [comment] INNER JOIN user_info on user_info.id = [comment].user_id  WHERE  post_id = :id ", ['id' => $post['id']])->findOrFail();
        $post['comments'] = $comments;
        return $post;
    }
}
