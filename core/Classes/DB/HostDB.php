<?php

namespace core\Classes\DB;

use core\Database;


class HostDB
{

    private $dbref;
    private static $tableMap = [
        '_user' => [
            'first_name',
            'last_name',
            'user_name',
            'email',
            'type',
            'phone_num',
            'profile_img',
            'cover_img',
            'country',
            'password'
        ],
        'host' => [
            'Status',
            'Description',
            'Rate_average',
            'Traveller_num',
            'location',
        ]
    ];

    public static function add($data)
    {
        $dbref = Database::getInstance();
        extract($data);

        $dbref->query(
            "INSERT INTO _user (first_name, last_name,user_name,email,type, phone_num, profile_img, cover_img, country,password) 
                values(:fName,:lName,:userName,:email,:type, :phoneNum, :profileImg, :coverImg, :country, :password)
            ",
            [
                'fName' => $first_name,
                'lName' => $last_name,
                'userName' => $user_name,
                'email' => $email,
                'type' => $type,
                'phoneNum' => $phone_num,
                'profileImg' => $profile_img,
                'coverImg' => $cover_img,
                'country' => $country,
                'password' => $password
            ]
        );

        $userId =  $dbref->getLastRecordIdAdded("_user");

        if (isset($needs) && count($needs)) {
            $values = [];
            $params = [
                'id' => $userId,
                'status' => $status,
                'description' => $Description,
                'rate' => $Rate_average,
                'travelersNum' => $travelers_num,
                'location' => $location,
                'userId' => $userId,
                'hostId' => $userId
            ];
            $params['userId'] = $params['id'] = $userId;

            for ($i = 0; $i < count($needs); $i++) {
                $values[] = "(:hostId, :need$i)";
                $params[":need$i"] = $needs[$i];
            }

            $values_str = implode(',', $values);
            $stmt = $dbref->connection->prepare(
                "INSERT INTO host (Id,Status, Description, Rate_average, Traveller_num, Location, User_id) 
                    values(:id,:status,:description,:rate, :travelersNum, :location, :userId);
                INSERT INTO host_need (Host_id, Need_id)
                    VALUES $values_str;
            "
            );

            $stmt->execute($params);
        }

        return $userId;
    }

    public function delete($id)
    {
        Database::getInstance()->query(
            "DELETE FROM _user WHERE id=:id",
            [
                'id' => $id
            ]
        );
    }

    public static function update($data)
    {
        $dbref = Database::getInstance();
        extract($data);

        if (in_array($key, HostDB::$tableMap['_user'])) {
            $dbref->query("UPDATE _user SET $key = :value WHERE id = :id ", [
                'value' => $value,
                'id' => $id
            ]);
        } else if (in_array($key, HostDB::$tableMap['host'])) {
            $dbref->query("UPDATE host SET $key = :value WHERE id = :id ", [
                'value' => $value,
                'id' => $id
            ]);
        }
    }

    public static function search($data, $offset, $limit)
    {
        $dbref = Database::getInstance();
        extract($data);

        $needssCondition = $needIds && $needIds !== '' ? "AND Need_id IN ({$needIds})" : '';
        $countryCondition = $country && $country !== '' ? "AND country IN ({$country})" : '';

        $hosts = $dbref->query(
            "SELECT DISTINCT _user.* , Status, Description, Rate_average, Traveller_num, Location from _user 
                INNER JOIN host 
                ON host.User_id = _user.id
                LEFt JOIn host_need
                ON host_need.Host_id = _user.id
                WHERE (
                    first_name LIKE :first_name
                    OR 
                    last_name like :last_name
                ) 
                {$countryCondition}
                AND Rate_average between :startRate and :endRate 
                {$needssCondition}
                ORDER BY _user.id desc   
                LIMIT $limit
                OFFSET $offset 
            ",
            [
                'first_name' => '%' . $first_name . '%',
                'last_name' => '%' . $last_name . '%',
                'startRate' => $startRate,
                'endRate' => $endRate
            ]
        )->get();

        if (empty($hosts))
            return [];

        $hostIds = implode(
            ',',
            array_map(function ($host) {
                return $host['Id'];
            }, $hosts)
        );

        $hostNeeds = $dbref->query(
            "SELECT service.*, host_need.Host_id from host_need
                INNER JOIN service
                on host_need.Need_id = service.Id
                WHERE host_need.Host_id IN ({$hostIds})
                ORDER BY host_need.Host_id desc
            "
        )->get();

        foreach ($hosts as $num => $host) {
            $host['needs'] = [];

            foreach ($hostNeeds as $key => $need) {
                if ($host['Id'] !== $need['Host_id'])
                    break;

                $host['needs'][] = [
                    'id' => $need['Id'],
                    'name' => $need['name']
                ];

                unset($hostNeeds[$key]);
            }

            $hosts[$num] = $host;
        }

        return $hosts;
    }

    public static function getOne($id)
    {
        $dbref = Database::getInstance();

        $host = $dbref->query(
            "SELECT _user.* ,status, Description, Rate_average, Traveller_num, location, user_id from _user 
                INNER JOIN host 
                ON host.User_id = _user.Id
                WHERE _user.Id = :id
        ",
            ['id' => $id]
        )->findOrFail();

        $needs = $dbref->query(
            "SELECT service.* from service
                INNER JOIN host_need
                ON service.Id = host_need.Need_id
                WHERE host_need.Host_id = :hostId
            ",
            ['hostId' => $host['Id']]
        )->get();
        $host['needs'] = $needs ? $needs : [];

        $notificationIds = $dbref->query(
            "SELECT id from notification
                WHERE reciever_id = :hostId
            ",
            ['hostId' => $host['Id']]
        )->get();
        $host['notificationIds'] = $notificationIds ? $notificationIds : [];

        return $host;
    }

    public static function addNeed($hostId, $needId)
    {
        Database::getInstance()->query(
            "INSERT INTO host_need (traveller_id, Need_id)
                VALUES (:hostId, :needId);
            ",
            [
                'hostId' => $hostId,
                'needId' => $needId
            ]
        );
    }

    public static function removeNeed($hostId, $needId)
    {
        Database::getInstance()->query(
            "DELETE FROM host_need 
                WHERE traveller_id = :hostId
                    AND Need_id = :needId;
            ",
            [
                'hostId' => $hostId,
                'needId' => $needId
            ]
        );
    }
}
