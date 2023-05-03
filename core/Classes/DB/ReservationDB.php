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

    Database::getInstance()->query(
      "INSERT INTO  reservation (host_id,traveller_id,status,Start_date, end_date) 
            
            values(:host_id,:traveller_id,:status,:start_date,:end_date)",
      [
        'host_id' => $data['host_id'],
        'traveller_id' => $data['traveller_id'],
        'status' => $data['status'],
        'start_date' => '0000-00-00 00:00:00',
        'end_date' => '0000-00-00 00:00:00'
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

    Database::getInstance()->query("UPDATE reservation SET $key = :value WHERE id = :id ", [
      'value' => $value,
      'id' => $id
    ]);
  }

  public static function search($data, $offset= 0, $limit = 1)
  {
    extract($data);
    return Database::getInstance()->query(
      "SELECT * FROM reservation 
      WHERE (
            id LIKE :id
            OR 
            host_id like :host_id
            OR
            traveller_id like :traveller_id
            OR
            status like :status
            OR
            start_date like :start_date
            OR
            end_date like :end_date

        ) 
        ORDER BY id desc  LIMIT $limit OFFSET $offset ",
      [
        'id' => '%' . $id . '%',
        'host_id' => '%' . $host_id . '%',
        'traveller_id' => '%' . $traveller_id . '%',
        'status' => '%' . $status . '%',
        'start_date' => '%' . $start_date . '%',
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