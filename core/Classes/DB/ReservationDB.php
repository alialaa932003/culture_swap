<?php

namespace core\Classes\DB;

use core\Database;


class ReservationDB
{


  function __construct()
  {
  }

  public function add($data)
  {

    Database::getInstance()->query(
      "INSERT INTO  Reservation (host_id,traveller_id,status) 
            
            values(:host_id,:traveller_id,:status)",
      [
        'host_id' => $data['host_id'],
        'traveller_id' => $data['traveller_id'],
        'status' => $data['status'],
      ]
    );
    return Database::getInstance()->getLastRecordIdAdded("Reservation");
  }

  public static function delete($id)
  {
    Database::getInstance()->query(
      "DELETE FROM Reservattion WHERE id=:id",
      [

        'id' => $id
      ]
    );
  }

  public function update($data)
  {
    extract($data);

    Database::getInstance()->query("UPDATE Reservation SET $key = :value WHERE id = :id ", [
      'value' => $value,
      'id' => $id
    ]);
  }

  public function search($str, $offset, $limit)
  {
    return Database::getInstance()->query(
      "SELECT * FROM Reservation WHERE id LIKE '%:str%'  ORDER BY id desc  LIMIT :limit OFFSET :offset ",
      ['limit' => $limit, 'offset' => $offset, 'str' => $str]
    )->get();
  }

  public static function getAll()
  {

    return Database::getInstance()->query("SELECT * FROM Reservation")->get();
  }

  public static function getOne($id)
  {
    $reservation = Database::getInstance()->query("SELECT * FROM Reservation WHERE Reservation.id = :id", ['id' => $id])->findOrFail();
    if (empty($reservation)) {
      return [];
    }
    return $reservation;
  }



}