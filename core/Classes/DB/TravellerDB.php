<?php

namespace core\Classes\DB;

use core\Database;


class TravellerDB
{
    private static $tableMap = [
        '_user' => [
            'first_name',
            'last_name',
            'email',
            'type',
            'phone_num',
            'profile_img',
            'cover_img',
            'country'
        ]
    ];

    public static function add($data)
    {
        extract($data);
        $dbref = Database::getInstance();

        $dbref->query(
            "INSERT INTO _user (first_name, last_name,email,type, phone_num, profile_img, cover_img, country) 
                values(:fName,:lName,:email,:type, :phoneNum, :profileImg, :coverImg, :country)
            ",
            [
                'fName' => $first_name,
                'lName' => $last_name,
                'email' => $email,
                'type' => $type,
                'phoneNum' => $phone_num,
                'profileImg' => $profile_img,
                'coverImg' => $cover_img,
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
                    VALUES $values_str;"
            );

            $stmt->execute($params);
        }

        return $userId;
    }

    public static function delete($id)
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
        extract($data);
        $dbref = Database::getInstance();

        if (in_array($key, TravellerDB::$tableMap['_user'])) {
            $dbref->query("UPDATE _user SET $key = :value WHERE id = :id ", [
                'value' => $value,
                'id' => $id
            ]);
        }
    }

    public static function search($data, $offset, $limit)
    {
        $dbref =  Database::getInstance();
        extract($data);

        $servicesCondtion = $serviceIds ? "AND service_id IN ($serviceIds)" : '';

        $travellers = $dbref->query(
            "SELECT DISTINCT _user.*  from _user 
                INNER JOIN traveller 
                ON traveller.user_id = _user.id
                INNER JOIn traveller_service
                ON traveller_service.traveller_id = _user.id
                WHERE (
                    first_name LIKE :first_name
                    OR 
                    last_name like :last_name
                    OR
                    country like :country 
                ) 
                {$servicesCondtion}
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

        if (empty($travellers))
            return [];

        $travellerIds = implode(
            ',',
            array_map(function ($traveller) {
                return $traveller['Id'];
            }, $travellers)
        );

        $travellerSevices = $dbref->query(
            "SELECT service.*, traveller_service.traveller_id from traveller_service
                INNER JOIN service
                on traveller_service.service_id = service.id
                WHERE traveller_service.traveller_id IN ({$travellerIds})
                ORDER BY traveller_service.traveller_id desc
            "
        )->get();

        foreach ($travellers as $num => $traveller) {
            $traveller['services'] = [];

            foreach ($travellerSevices as $key => $service) {
                if ($traveller['Id'] !== $service['traveller_id'])
                    break;

                $traveller['services'][] = [
                    'Id' => $service['Id'],
                    'name' => $service['name']
                ];

                unset($travellerSevices[$key]);
            }

            $travellers[$num] = $traveller;
        }

        return $travellers;
    }

    public static function getOne($id)
    {
        $dbref = Database::getInstance();

        $traveller = $dbref->query(
            "SELECT _user.* from _user 
                WHERE id = :id
            ",
            ['id' => $id]
        )->find();

        $services = $dbref->query(
            "SELECT service.* from service
                INNER JOIN traveller_service
                ON service.id = traveller_service.service_id
                WHERE traveller_service.traveller_id = :travellerId
            ",
            ['travellerId' => $traveller['Id']]
        )->get();
        $traveller['services'] = $services ? $services : [];

        $notificationIds = $dbref->query(
            "SELECT id from notification
                WHERE reciever_id = :travellerId
            ",
            ['travellerId' => $traveller['Id']]
        )->get();
        $traveller['notificationIds'] = $notificationIds ? $notificationIds : [];

        $favHostIds = $dbref->query(
            "SELECT fav_host_id from traveller_fav_hosts
                WHERE traveller_id = :travellerId
            ",
            ['travellerId' => $traveller['Id']]
        )->get();
        $traveller['favHostIds'] = $favHostIds ? $favHostIds : [];

        $friendIds = $dbref->query(
            "SELECT friend_id from traveller_friend
                WHERE traveller_id = :travellerId
            ",
            ['travellerId' => $traveller['Id']]
        )->get();
        $traveller['friendIds'] = $friendIds ? $friendIds : [];

        return $traveller;
    }

    public static function addService($travellerId, $serviceId)
    {
        Database::getInstance()->query(
            "INSERT INTO traveller_service (traveller_id, service_id)
                VALUES (:travellerId, :serviceId);
            ",
            [
                'travellerId' => $travellerId,
                'serviceId' => $serviceId
            ]
        );
    }

    public static function removeService($travellerId, $serviceId)
    {
        Database::getInstance()->query(
            "DELETE FROM traveller_service 
                WHERE traveller_id = :travellerId
                    AND service_id = :serviceId;
            ",
            [
                'travellerId' => $travellerId,
                'serviceId' => $serviceId
            ]
        );
    }

    public static function addFavHost($travellerId, $favHostId)
    {
        Database::getInstance()->query(
            "INSERT INTO traveller_fav_hosts (traveller_id, fav_host_id)
                VALUES (:travellerId, :favHostId);
            ",
            [
                'travellerId' => $travellerId,
                'favHostId' => $favHostId
            ]
        );
    }

    public static function removeFavHost($travellerId, $favHostId)
    {
        Database::getInstance()->query(
            "DELETE FROM traveller_fav_hosts 
                WHERE traveller_id = :travellerId
                    AND fav_host_id = :favHostId;
            ",
            [
                'travellerId' => $travellerId,
                'favHostId' => $favHostId
            ]
        );
    }

    public static function addFriend($travellerId, $friendId)
    {
        Database::getInstance()->query(
            "INSERT INTO traveller_friend (traveller_id, friend_id)
                VALUES (:travellerId, :friendId);
            ",
            [
                'travellerId' => $travellerId,
                'friendId' => $friendId
            ]
        );
    }

    public static function removeFriend($travellerId, $friendId)
    {
        Database::getInstance()->query(
            "DELETE FROM traveller_friend 
                WHERE traveller_id = :travellerId
                    AND friend_id = :friendId;
            ",
            [
                'travellerId' => $travellerId,
                'friendId' => $friendId
            ]
        );
    }
}
