<?php

namespace core\Classes\DB;

use core\Database;


class HostDB
{

    private $dbref;
    private static $tableMap = [
        'user' => [
            'fName',
            'lName',
            'email',
            'type',
            'phoneNum',
            'profilePic',
            'country'
        ],
        'host' => [
            'status',
            'description',
            'rate',
            'travelersNum',
            'location',
        ],
        'host_need' => [
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
        $this->dbref->query(
            "INSERT INTO host ([status], [description], rate, travelers_num, [location], user_id) 
                values(:status,:description,:rate, :travelersNum, :location, :userId)
            ",
            [
                'status' => $status,
                'description' => $description,
                'rate' => $rate,
                'travelersNum' => $travelersNum,
                'location' => $location,
                'userId' => $userId,
            ]
        );

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

        if (in_array($key, HostDB::$tableMap['_user'])) {
            $this->dbref->query("UPDATE _user SET $key = :value WHERE id = :id ", [
                'value' => $value,
                'id' => $id
            ]);
        } else if (in_array($key, HostDB::$tableMap['host'])) {
            $this->dbref->query("UPDATE host SET $key = :value WHERE id = :id ", [
                'value' => $value,
                'id' => $id
            ]);
        }
    }

    public function search($data, $offset, $limit)
    {
        extract($data);
        return $this->dbref->query(
            "SELECT _user.* , [status],[descriiption],rate,travellers_num , [location] from _user 
            INNER JOIN host 
            ON host.User_id = _user.id
            INNER JOIN host_need
            ON _user.id = host_id
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
            "SELECT _user.* , [status],[descriiption],rate,travellers_num , [location] from _user 
            INNER JOIN host 
            ON host.User_id = _user.id
            WHERE _user.id = :id
            ",
            ['id' => $id]
        )->findOrFail();

        $needs = $this->dbref->query(
            "SELECT service.* from service
                INNER JOIN host_need
                ON service.id = host_need.service_id
                WHERE host_need.traveler_id = :hostId
            ",
            ['hostId' => $host['id']]
        );
        $host['needs'] = $needs;

        return $host;
    }
}
