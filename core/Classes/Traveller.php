<?php

namespace core\Classes;

//! The class is not copleted yet

class Traveller extends User
{
  // Data fields
  
  private $service;
  private $froendsIds = [];
  private $favHostsIds = [];

  // Constructors
  public function __construct()
  {
    // Default constructor
  }

  public function __construct1($username, $password, $type)
  {
    // Constructor with three parameters
    $this->username = $username;
    $this->password = $password;
    $this->type = $type;
  }

  public function __construct2($name, $username, $password, $type, $email, $phoneNumber, $country, $service)
  {
    // Constructor with eight parameters
    $this->name = $name;
    $this->username = $username;
    $this->password = $password;
    $this->type = $type;
    $this->email = $email;
    $this->phoneNumber = $phoneNumber;
    $this->country = $country;
    $this->service = $service;
  }


}