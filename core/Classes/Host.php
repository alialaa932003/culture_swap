<?php

namespace core\Classes\DB;

use core\Database;

class Host extends User
{
    private $location;
    private $status;
    private $description;
    private $needs;
    private $Traveller_num;
    private $rate;
    private $reviews;



    public function add($data)
    {
      $id = HostDB::add($data);
      extract($data);
      $this->id = $id;
      $this->firstName = $f_name;
      $this->lastName = $l_name;
      $this->username = $username;
      $this->password = $password;
      $this->type = $type;
      $this->email = $email;
      $this->phoneNumber = $phone_num;
      $this->country = $country;

      $this->location  = $Location;
      $this->status = $Status;
     
      $this->description = $Description;
      $this->needs = $Needs;////////////////////////////////////////////////////////
  
      $this->Traveller_num = $Traveller_num;
      $this->rate = $Rate_average;
  
    }





    public function getLocation()
    {
        return $this->location;
    }



    public function setLocation($location)/////////////////////////////
    {
    
        HostDB::update($this->id, 'Location' , $location);           // Location

        $this->location = $location;
    }




    public function getStatus()
    {
        return $this->status;
    }



    public function setStatus($status)//////////////////////////////////
    {
        HostDB::update(this->id,'Status',$status );

        $this->status = $status;
    }





    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)////////////////////////////////////////
    {
        HostDB::update(this->id,'Description',$description);

        
        $this->description = $description;
    }





    public function getneeds()
    {
        return $this->needs;
    }

    public function setneeds($needs)/////////////////////////////////
    {
        HostDB::update(this->id,    );


        $this->needs = $needs;
    }



    public function getTraveller_num()
    {
        return $this->Traveller_num;
    }

    public function setTraveller_num($Traveller_num)///////////////////////////////
    {

        HostDB::update(this->id,'Traveller_num',$Traveller_num );

        $this->Traveller_num = $Traveller_num;
    }


    public function getrate()
    {
        return $this->rate;
    }

    public function setrate($rate)//////////////////////////////////////////
    {
        HostDB::update(this->id,'$Rate_average',$rate);

        $this->rate = $rate;
    }




    public function getReviews()
    {
        return $this->reviews;
    }

    public function setReviews($reviews)///////////////////////////
    {

        HostDB::update(this->id ,     );


        $this->reviews = $reviews;
    }
    

    


    public static function search($condition, $skip, $limit)
    {
      $host = HostDB::search("{$condition}", 0, 1);
      return $host;
    }



    public function getOne($id)
    {
        $host = HostDB::getOne($id);
       
        extract($host);

        $this->id = id;

        $this->firstname = $f_name;

        $this->LastName = $l_name;

        $this->username = $username;

        $this->password = $password;

        $this->type = $type;

        $this->email = $email;

        $this->phoneNumber = $phone_num;

        $this->country = $country;

      
        $this->status = $Status;

        $this->description = $Description;

        $this->location = $Location;

        $this->rate  = $Rate_average;

        $this->needs = $Needs;

        $this->Traveller_num = $Traveller_num;
    }

}
