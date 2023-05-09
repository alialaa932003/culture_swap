<?php

namespace core\Classes\DB;

use core\Database;


class ReservationDB
{


  function __construct()
  {
  }

  public static function add($data)
  {
    extract($data);
    Database::getInstance()->query(
      "INSERT INTO  reservation (host_id,traveller_id,Status,Start_date, end_date) 
            
            values(:host_id,:traveller_id,:Status,:Start_date,:end_date)",
      [
        'host_id' => $host_id,
        'traveller_id' => $traveller_id,
        'Status' => $Status,
        'Start_date' => $Start_date,
        'end_date' => $end_date
      ]
    );
    return Database::getInstance()->getLastRecordIdAdded("reservation");
  }

  public static function delete($id)
  {
    Database::getInstance()->query(
      "DELETE FROM reservation WHERE id=:id",
      [

        'id' => $id
      ]
    );
  }

  public static function update($data)
  {
    extract($data);

    Database::getInstance()->query("UPDATE reservation SET $key = :value WHERE Id = :id ", [
      'value' => $value,
      'id' => $Id
    ]);
  }

  public static function search($data, $offset= 0, $limit = 1)
  {
    extract($data);
    return Database::getInstance()->query(
      "SELECT * FROM reservation 
      WHERE (
            Id LIKE :Id
            AND 
            host_id like :host_id
            AND
            traveller_id like :traveller_id
            AND
            Status like :Status
            AND
            Start_date like :Start_date
            AND
            end_date like :end_date

        ) 
        ORDER BY id desc  LIMIT $limit OFFSET $offset ",
      [
        'Id' => '%' . $Id . '%',
        'host_id' => '%' . $host_id . '%',
        'traveller_id' => '%' . $traveller_id . '%',
        'Status' => '%' . $Status . '%',
        'Start_date' => '%' . $Start_date . '%',
        'end_date' => '%' . $end_date . '%',
      ]
    )->get();
  }

  public static function getAll()
  {

    return Database::getInstance()->query("SELECT * FROM reservation")->get();
  }

  public static function getOne($id)
  {
    $reservation = Database::getInstance()->query("SELECT * FROM reservation WHERE reservation.id = :id", ['id' => $id])->findOrFail();
    if (empty($reservation)) {
      return [];
    }
    return $reservation;
  }



}