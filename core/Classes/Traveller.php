<?php

namespace core\Classes;

//! The class is not copleted yet

class Traveller extends User
{
  // Data fields
  
  private $service;
  private $friendsIds = [];
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
  
  // Methods
  public function getService(){
    return $this->service;
  }
  
  public function setService($service){
    $this->service = $service;
  }
  
  public function getFavHostsIds(){
    return $this->favHostsIds;
  }
  
  public function getFriendsIds(){
    return $this->friendsIds;
  }
  public function addFavHostId($hostId){
    array_push($this->favHostsIds, $hostId);
  }
  
  public function removeFavHostsId($hostId){
    $index = array_search($hostId, $this->favHostsIds);
    if ($index !== false) {
      unset($this->favHostsIds[$index]);
      return true;
    }
    return false;
  }

  public function makeReview($rate , $hostId){
    $review = new Review($hostId, $this->id, $rate);
    return $review;
  }

  public function removeReview($reviewId){

  }

  public function makeReservation($hostId){
    $reservation = new Reservation($this->id, $hostId, 0); // 0 here is pending
    return $reservation;
  }

  public function cancelReservation(){
    
  }

  public function addFriend($friendId){
    array_push($this->friendsIds, $friendId);
    $friend = new Friend($friendId, $travellerId);
    return $friend;
  }

  public function removeFriend($friendId){
    $index = array_search($friendId, $this->friendsIds);
    if ($index !== false) {
      unset($this->friendsIds[$index]);
      return true;
    }
    return false;
  }


}