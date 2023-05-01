<?php

namespace core\Classes;

use core\Database;


class Hostdb
{

    private $dbref;
    private static $tableMap = [
        'user_info' => [
            'fName',
            'lName',
            'email',
            'type',
            'phoneNum',
            'profilePic',
            'country'
        ],
        'host_profile' => [
            'id',
            'status',
            'description',
            'rate',
            'travelersNum',
            'location',
            'userId'
        ]
    ];
    function __construct()
    {
        $this->dbref = Database::getInstance();
    }

    public function add($data)
    {
        $this->dbref->query(
            "INSERT INTO TABLE user_info (f_name, l_name,email,[type], phone_num, profile_picture, country) 
                values(:fName,:lName,:email,:type, :phoneNum, :profilePic, :country)
            ",
            [
                'fName' => $data['fName'],
                'lName' => $data['lName'],
                'email' => $data['email'],
                'type' => $data['type'],
                'phoneNum' => $data['phoneNum'],
                'profilePic' => $data['profilePic'],
                'country' => $data['country'],
            ]
        );
        $userId =  $this->dbref->getLastRecordIdAdded("user_info");

        $this->dbref->query(
            "INSERT INTO TABLE host_profile (id,[status], [description], rate, travelers_num, [location], user_id) 
                values(:id,:status,:description,:rate, :travelersNum, :location, :userId)
            ",
            [
                'id' => $userId,
                'status' => $data['status'],
                'description' => $data['description'],
                'rate' => $data['rate'],
                'travelersNum' => $data['travelersNum'],
                'location' => $data['location'],
                'userId' => $userId,
            ]
        );

        return $this->dbref->getLastRecordIdAdded("host_profile");
    }
    public function delete($id)
    {
        $this->dbref->query(
            "DELETE FROM user_info WHERE id=:id",
            [
                'id' => $id
            ]
        );
    }
    public function update($data)
    {
        extract($data);

        if (in_array($key, HostDB::$tableMap['user_info'])) {
            $this->dbref->query("UPDATE user_info SET $key = :value WHERE id = :id ", [
                'value' => $value,
                'id' => $id
            ]);
        } else if (in_array($key, HostDB::$tableMap['host_profile'])) {
            $this->dbref->query("UPDATE host_profile SET $key = :value WHERE id = :id ", [
                'value' => $value,
                'id' => $id
            ]);
        }
    }
    public function search($data, $offset, $limit)
    {

        $needs = ['egypt', 'turkey'];
        extract($data);
        return $this->dbref->query(
            "SELECT user_info.* , [status],[descriiption],rate,travellers_num , [location] from user_info 
            INNER JOIN host_profile 
            ON host_profile.User_id = user_info.id
            INNER JOIN host_need
            ON user_info.id = host_id
            INNER JOIN [service]
            ON [service].id = host_need.service_id
            WHERE (
                first_name LIKE '%:fName%'
                OR 
                last_name like '%:lName%'
            ) 
            AND country like '%:country%' 
            AND rate between :startRate and :endRate 
            AND [service].name like '%egypt%'
            ORDER BY id desc  
            LIMIT :limit 
            OFFSET :offset 
            ",
            ['limit' => $limit, 'offset' => $offset, 'str' => $str]
        )->get();
    }
    public function getOne($id)
    {
        $host = $this->dbref->query(
            "SELECT user_info.* , [status],[descriiption],rate,travellers_num , [location] from user_info 
            INNER JOIN host_profile 
            ON host_profile.User_id = user_info.id
            WHERE user_info.id = :id
            ",
            ['id' => $id]
        )->findOrFail();

        return $host;
    }
}
