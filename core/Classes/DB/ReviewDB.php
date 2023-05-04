<?php

namespace core\Classes\DB;

use core\Database;


class ReservationDB
{



    public static function add($data)
    {
      extract($data);
      Database::getInstance()->query(
        "INSERT INTO  host_review ( host_id,reviewer_id,review) 
              
         values(:host_id,:reviewer_id,:review)",
        [
          'host_id' => $host_id,
          'reviewer_id' => $reviewer_id,
          'review' => $review
          
        ]
      );
      return Database::getInstance()->getLastRecordIdAdded("host_review");
    }





    public static function delete($id)
    {
      Database::getInstance()->query(
        "DELETE FROM  host_review WHERE id=:id",
        [
  
          'id' => $id
        ]
      );
    }
  



 public static function update($data)
  {
    extract($data);

    Database::getInstance()->query("UPDATE host_review SET $key = :value WHERE id = :id ", [
      'value' => $value,
      'id' => $id
    ]);
  }



  public static function search($data, $offset= 0, $limit = 1)
  {
    extract($data);
    return Database::getInstance()->query(

/*
write code sql here



*/


     )->get();
  }





  public static function getAll()
  {

    return Database::getInstance()->query("SELECT * FROM host_review")->get();
  }






  public static function getOne($id)
  {
    $host_review = Database::getInstance()->query("SELECT * FROM host_review WHERE host_review.id = :id", ['id' => $id])->findOrFail();
    if (empty($host_review)) {
      return [];
    }
    return $host_review;
  }











}














