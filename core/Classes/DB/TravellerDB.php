<?php

namespace core\Classes\DB;

use core\Database;


class TravellerDB
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
        'traveller_service' => [
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
        $params['userId'] = $params['travellerId'] = $userId;

        for ($i = 0; $i < count($services); $i++) {
            $values[] = "(:travellerId, :service$i)";
            $params[":service$i"] = $service[$i];
        }

        $values_str = implode(',', $values);
        $stmt = $dbref->prepare(
            "INSERT INTO traveller ( user_id) 
                values(:id, :userId)
            INSERT INTO traveller_service (traveller_id, service_id)
                VALUES $values_str
    "
        );

        $stmt->execute($params);

        return $this->dbref->getLastRecordIdAdded("traveller");
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

        if (in_array($key, TravellerDB::$tableMap['_user'])) {
            $this->dbref->query("UPDATE _user SET $key = :value WHERE id = :id ", [
                'value' => $value,
                'id' => $id
            ]);
        } else if (in_array($key, TravellerDB::$tableMap['traveller_service'])) {
            $this->dbref->query("UPDATE traveller_service SET $key = :value WHERE id = :id ", [
                'value' => $value,
                'id' => $id
            ]);
        }
    }

    public function search($data, $offset, $limit)
    {
        extract($data);

        $traveller = $this->dbref->query(
            "SELECT _user.* ,  service.* from _user 
                INNER JOIN traveller 
                ON traveller.user_id = _user.id
                INNER JOIN traveller_service
                on traveller_service.traveller_id = traveller.id
                INNER JOIN service
                on traveller_service.service_id = service.id
                WHERE (
                    first_name LIKE :first_name
                    OR 
                    last_name like :last_name
                ) 
                AND country like :country 
                ORDER BY _user.id desc   
                LIMIT $limit
                OFFSET $offset 
            ",
            [
                'first_name' => '%' . $first_name . '%',
                'last_name' => '%' . $last_name . '%',
                'country' => '%' . $country . '%'
            ]
        )->get();

        // $services = $this->dbref->query("");

        return $traveller;
    }

    public function getOne($id)
    {
        $traveller = $this->dbref->query(
            "SELECT _user.* , [status],[descriiption],rate,travellers_num , [location] from _user 
                INNER JOIN traveller 
                ON traveller.User_id = _user.id
                WHERE _user.id = :id
            ",
            ['id' => $id]
        )->findOrFail();

        $services = $this->dbref->query(
            "SELECT service.* from service
        INNER JOIN traveller_service
        ON service.id = traveller_service.service_id
        WHERE traveller_service.traveller_id = :travellerId
        ",
            ['travellerId' => $traveller['id']]
        );
        $traveller['services'] = $services;

        return $traveller;
    }
}
