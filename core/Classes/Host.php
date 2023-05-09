<?php

namespace core\Classes;

use core\Database;
use core\Classes\DB\HostDB;

class Host extends User
{
    private $location;
    private $status;
    private $description;
    private $needs = [];
    private $Traveller_num;
    private $rate;
    private $reviews;





    public function getLocation()
    {
        return $this->location;
    }



    public function setLocation($location)
    {

        HostDB::update([
            'id' => $this->id,
            'key' => 'Location',
            'value' => $location
        ]);



        $this->location = $location;
    }




    public function getStatus()
    {
        return $this->status;
    }



    public function setStatus($status)
    {

        HostDB::update([
            'id' => $this->id,
            'key' => 'Status',
            'value' => $status
        ]);

        $this->status = $status;
    }





    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        HostDB::update([
            'id' => $this->id,
            'key' => 'Description',
            'value' => $description
        ]);




        $this->description = $description;
    }





    public function getneeds()
    {
        return $this->needs;
    }

  /*    public function setneeds($needs)/////////////////////////////////
    {
      
        HostDB::update([
            'id' => $this->id,
            'key' => '  ',
            'value' => $needs
          ]);

        $this->needs = $needs;
    }
*/


    public function getTraveller_num()
    {
        return $this->Traveller_num;
    }

    public function setTraveller_num($Traveller_num)
    {
        HostDB::update([
            'id' => $this->id,
            'key' => 'Traveller_num',
            'value' => $Traveller_num
        ]);



        $this->Traveller_num = $Traveller_num;
    }


    public function getrate()
    {
        return $this->rate;
    }

    public function setrate($rate)
    {
        HostDB::update([
            'id' => $this->id,
            'key' => 'Rate_average',
            'value' => $rate
        ]);


        $this->rate = $rate;
    }




    public function getReviews()
    {
        return $this->reviews;
    }

    public function setReviews($reviews) ///////////////////////////
    {

        HostDB::update([
            'id' => $this->id,
            'key' => 'needs name',
            'value' => $reviews
        ]);


        $this->reviews = $reviews;
    }






    public function add($data)
    {
        $id = HostDB::add($data);
        extract($data);
        $this->id = $id;
        $this->firstName = $first_name ;
        $this->lastName = $last_name;
        $this-> user_name = $user_name ;
        $this->password = $password;
        $this->type = $type;
        $this->coverPhoto = $cover_img;
        $this->profilePhoto = $profile_img;
        $this->email = $email;
        $this->phoneNumber = $phone_num;
        $this->country = $country;
        $this->status =$Status;
        $this->description = $Description;
        $this->location = $location;
        $this->Traveller_num = $Traveller_num ;
        $this->rate =$Rate_average ;
        $this->needs[] =$needs;
    }





    public function delete($id)
    {
        HostDB::delete($id);
    }






    /*

d ckkmkmkddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd
zdmcnsklnsddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd

*/


    public static function getNAme($hostId)
    {
        $host = HostDB::getOne($hostId);

        $firstname = $host['first_name'];
        $lastname = $host['last_name'];
        $Name = $firstname . " " . $lastname;

        return $Name;
    }


    /*

d ckkmkmkddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd
zdmcnsklnsddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd

*/


    public static function search($attributes, $skip, $limit)
    {
        $host = HostDB::search($attributes, $skip, $limit);
        return $host;
    }





    public function getOne($id)
    {
        $host = HostDB::getOne($id);
        extract($host);

        $this->id = $id;
        $this->firstName = $first_name;
        $this->lastName = $last_name;
        $this->user_name = $user_name;
        $this->password = $password;
        $this->type = $type;
        $this->coverPhoto = $cover_img;
        $this->profilePhoto = $profile_img;
        $this->email = $email;
        $this->phoneNumber = $phone_num;
        $this->country = $country;
        $this->notification[] = $notificationIds;

        $this->location = $location;
        $this->status = $Status;


        $this->description = $Description;

        $this->needs[] = $needs; ////////////////////////////////////////////////////////

        $this->Traveller_num = $Traveller_num;
        $this->rate = $Rate_average;
    }



    public function makeComment($travellerId, $hostId, $hostName, $actionId)
    {
        $content = "{$hostName} comment at your post";
        $action = 2;

        Notification::makeNoti($travellerId, $hostId, $content, $action, $actionId);
    }

    public function makeLove($travellerId, $hostId, $hostName, $actionId)
    {
        $content = "{$hostName} love your post";
        $action = 3;

        Notification::makeNoti($travellerId, $hostId, $content, $action, $actionId);
    }





    public function getNotification()
    {
        return Notification::getAll($this->getId());
    }






    public static function takeAction($id, $actionValue, $actionId)
    {
        Reservation::updateStatus($id, $actionValue, $actionId);
    }
}
