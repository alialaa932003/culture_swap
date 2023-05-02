<?php

namespace core\Classes;

use core\Database;


class Hostdb
{

  private $dbref;
  private static $tableMap = [
    '_user' => [
      'fName',
      'lName',
      'email',
      'type',
      'phoneNum',
      'profilePic',
      'country'
    ],
    'traveler_service' => [
      'service_id'
    ]
  ];

  function __construct()
  {
    $this->dbref = Database::getInstance();
  }

  public function add($data)
  {
    extract($data);

    $this->dbref->query(
      "INSERT INTO _user (f_name, l_name,email,[type], phone_num, profile_picture, country) 
        values(:fName,:lName,:email,:type, :phoneNum, :profilePic, :country)
      ",
      [
        'fName' => $fName,
        'lName' => $lName,
        'email' => $email,
        'type' => $type,
        'phoneNum' => $phoneNum,
        'profilePic' => $profilePic,
        'country' => $country,
      ]
    );

    $userId =  $this->dbref->getLastRecordIdAdded("_user");
    $values = [];
    $params = [];
    $params['userId'] = $params['travelerId'] = $userId;

    for ($i = 0; $i < count($services); $i++) {
      $values[] = "(:travelerId, :service$i)";
      $params[":service$i"] = $service[$i];
    }

    $values_str = implode(',', $values);
    $stmt = $dbref->prepare(
      "INSERT INTO traveler ( user_id) 
        values(:id, :userId)
      INSERT INTO traveler_service (traveler_id, service_id)
        VALUES $values_str
    "
    );

    $stmt->execute($params);

    return $this->dbref->getLastRecordIdAdded("traveler");
  }

  public function delete($id)
  {
    $this->dbref->query(
      "DELETE FROM _user WHERE id=:id",
      [
        'id' => $id
      ]
    );
  }

  public function update($data)
  {
    extract($data);

    if (in_array($key, HostDB::$tableMap['_user'])) {
      $this->dbref->query("UPDATE _user SET $key = :value WHERE id = :id ", [
        'value' => $value,
        'id' => $id
      ]);
    } else if (in_array($key, HostDB::$tableMap['traveler_service'])) {
      $this->dbref->query("UPDATE traveler_service SET $key = :value WHERE id = :id ", [
        'value' => $value,
        'id' => $id
      ]);
    }
  }

  public function search($data, $offset, $limit)
  {
    extract($data);

    $traveler = $this->dbref->query(
      "SELECT _user.* , [status],[descriiption],rate,travellers_num , [location], service.* from _user 
        INNER JOIN traveler 
        ON traveler.User_id = _user.id
        INNER JOIN traveler_service
        on traveler_service.traveler_id = traveler.id
        INNER JOIN service
        on traveler_service.service_id = service.id
        WHERE (
            first_name LIKE '%:fName%'
            OR 
            last_name like '%:lName%'
        ) 
        AND country like '%:country%' 
        ORDER BY id desc  
        LIMIT :limit 
        OFFSET :offset 
        ",
      [
        'fName' => $fName ?? '',
        'lName' => $lName ?? '',
        'country' => $country ?? '',
        'limit' => $limit ?? '',
        'offset' => $offset ?? '',
      ]
    )->get();

    // $services = $this->dbref->query("");

    return $traveler;
  }

  public function getOne($id)
  {
    $traveler = $this->dbref->query(
      "SELECT _user.* , [status],[descriiption],rate,travellers_num , [location] from _user 
        INNER JOIN traveler 
        ON traveler.User_id = _user.id
        WHERE _user.id = :id
        ",
      ['id' => $id]
    )->findOrFail();

    $services = $this->dbref->query(
      "SELECT service.* from service
        INNER JOIN traveler_service
        ON service.id = traveler_service.service_id
        WHERE traveler_service.traveler_id = :travelerId
      ",
      ['travelerId' => $traveler['id']]
    );
    $traveler['services'] = $services;

    return $traveler;
  }
}
