<?php

namespace core\Classes;

//! The class is not copleted yet

class Traveller extends User
{
  // Data fields
  
  private $service = [
    'id' => '',
    'name' => ''
  ];
  private $friends = [];
  private $favHosts = [];
  private $reservation;

  // Constructors
  public function __construct()
  {
    // Empty constructor
  }
  
  
  public function add($data)
  {
    $id = TravellerDB::add($data);
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
    $this->service['id'] = $service_id;
    $this->service['name'] = $service_name;

  }

  public function delete($id){
    TravellerDB::delete($id);
  }
  
  // Methods
  public function getService(){ // Will return associative array
    return $this->service;
  }
  
  public function setService($service){ // here you will send associative array 
    TravellerDB::update([
      'id' => $this->id,
      'key' => 'service_name',
      'value' => $service['name']
    ]);
    TravellerDB::update([
      'id' => $this->id,
      'key' => 'service_name',
      'value' => $service['id']
    ]);
    $this->service = $service;
  }
  
  public function getFavHosts(){
    return $this->favHosts;
  }
  
  public function getFriends(){
    return $this->friends;
  }
  public function addFavHost($host){
    //! Not completed
    array_push($this->favHosts, $host); 
  }
  
  public function removeFavHosts($hostId){
    //! Not completed
    $index = array_search($hostId, $this->favHostsIds); 
    if ($index !== false) {
      unset($this->favHostsIds[$index]);
      return true;
    }
    return false;
  }

  public function makeReview($rate , $hostId){
    $review = new Review($hostId, $this->id, $rate); 
    $reviewId = ReviewDB::addReview($review); 
    return $review;
  }


  public function makeReservation($hostId){
    $reservation = new Reservation($this->id, $hostId, 0); // 0 here is pending
    $this->reservationId =  ReservationDB::addReservation($reservation); 
    return $reservation;
  }

  public function cancelReservation(){
    $this->reservationId = null;
    ReservationDataBase::deleteReseravtion($this->reservationId); 
  }

  public function addFriend($friendId){
    array_push($this->friendsIds, $friendId);
    $friend = new Friend($friendId, $this->id); 
    FriendDataBase::addFriend($friend);
    return $friend;
  }

  public function removeFriend($friendId){
    $index = array_search($friendId, $this->friendsIds); 
    if ($index !== false) {
      unset($this->friendsIds[$index]);
      FriendDataBase::deleteFriend($friendId);
      return true;
    }
    return false;
  }

  public function getOne($id){
    $traveller = TravelelrDB::getOne($id);
    extract($traveller);
    $this->id = id;
    $this->firstName = $f_name;
    $this->lastName = $l_name;
    $this->username = $username;
    $this->password = $password;
    $this->type = $type;
    $this->email = $email;
    $this->phoneNumber = $phone_num;
    $this->country = $country;
    $this->service = $service_name;
  }

  public static function search($attributes, $skip , $limit){
    $travellers = TravelelrDB::search($attributes, $skip, $limit); 
    return $travellers;
  }
}