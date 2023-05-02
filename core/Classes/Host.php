<?php

class Host extends User
{
    private $location;
    private $status;
    private $description;
    private $needs;
    private $Traveller_num;
    private $rate;
    private $reviews;




    public function __construct1($name, $age, $location, $status, $description, $hostLocation, $video, $photo, $rate, $reviews)
    {

        $this->location = $location;
        $this->status = $status;
        $this->description = $description;


        $this->rate = $rate;
        $this->reviews = $reviews;
    }






    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }




    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }





    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }





    public function getneeds()
    {
        return $this->needs;
    }

    public function setneeds($needs)
    {
        $this->needs = $needs;
    }



    public function getTraveller_num()
    {
        return $this->Traveller_num;
    }

    public function setTraveller_num($Traveller_num)
    {
        $this->Traveller_num = $Traveller_num;
    }


    public function getrate()
    {
        return $this->rate;
    }

    public function setrate($rate)
    {
        $this->rate = $rate;
    }




    public function getReviews()
    {
        return $this->reviews;
    }

    public function setReviews($reviews)
    {
        $this->reviews = $reviews;
    }
    


    
    public function addpost(  )
    {
       
    }
    
    public function removePost()
    {
       
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

      
        $this->status = $status;

        $this->description = $description;

        $this->location = $location;

        $this->rate  = $rate_average;

        $this->needs = $needs;

        $this->Traveller_num = $traveller_num;
    }
}
