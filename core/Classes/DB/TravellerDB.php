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
        $dbref = Database::getInstance();

        $dbref->query(
            "INSERT INTO _user (first_name, last_name,email,type, phone_num, profile_img, cover_img, country) 
                values(:fName,:lName,:email,:type, :phoneNum, :profileImg, :coverImg, :country)
            ",
            [
                'fName' => $fName,
                'lName' => $lName,
                'email' => $email,
                'type' => $type,
                'phoneNum' => $phoneNum,
                'profileImg' => $profileImg,
                'coverImg' => $coverImg,
                'country' => $country,
            ]
        );

        $userId = $dbref->getLastRecordIdAdded("_user");
        if (count($services)) {

            $values = [];
            $params = [];
            $params['userId'] = $params['id'] = $params['travellerId'] = $userId;

            for ($i = 0; $i < count($services); $i++) {
                $values[] = "(:travellerId, :service$i)";
                $params[":service$i"] = $services[$i];
            }

            $values_str = implode(',', $values);
            $stmt = $dbref->connection->prepare(
                "INSERT INTO traveller (Id, user_id) 
                    values(:id,:userId);
                INSERT INTO traveller_service (traveller_id, service_id)
                    VALUES $values_str"
            );

            $stmt->execute($params);
        }

        return $userId;
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
            "SELECT _user.* from _user 
                WHERE id = :id
            ",
            ['id' => $id]
        )->find();

        $services = $this->dbref->query(
            "SELECT service.* from service
                INNER JOIN traveller_service
                ON service.id = traveller_service.service_id
                WHERE traveller_service.traveller_id = :travellerId
            ",
            ['travellerId' => $traveller['Id']]
        )->find();

        $traveller['services'] = $services;

        return $traveller;
    }
}
