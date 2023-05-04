<?php

namespace core\Classes;

use core\Classes\DB\ReservationDB;
use core\Classes\DB\ReviewDB;
use core\Classes\DB\TravellerDB;

//! The class is not copleted yet

class Traveller extends User
{
  // Data fields

  private $service = [
    'id' => '',
    'name' => ''
  ];
  private $friendsIds = [];
  private $favHostsIds = [];
  private $reservationId;

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
    $this->firstName = $fName;
    $this->lastName = $lName;
    $this->username = $username;
    $this->password = $password;
    $this->type = $type;
    $this->email = $email;
    $this->phoneNumber = $phoneNum;
    $this->country = $country;
    $this->profilePhoto = $profilePhoto;
    $this->coverPhoto = $coverPhoto;
    $this->reservationId = $reservationId;
    $this->service['id'] = $services['Id'];
    $this->service['name'] = $services['name'];
    //! favHosts, travelelrFriendIds
  }

  public function delete($id)
  {
    TravellerDB::delete($id);
  }

  // Methods
  public function getService()
  { // Will return associative array
    return $this->service;
  }

  public function setService($service)
  { // here you will send associative array 
    TravellerDB::update([
      'id' => $this->id,
      'key' => 'service_name',
      'value' => $service['name']
    ]);
    TravellerDB::update([
      'id' => $this->id,
      'key' => 'service_id',
      'value' => $service['id']
    ]);
    $this->service = $service;
  }

  public function getFavHosts()
  {
    return $this->favHostsIds;
  }

  public function getFriends()
  {
    return $this->friendsIds;
  }
  public function addFavHost($hostId)
  {
    //! Not completed
    array_push($this->favHostsIds, $hostId);
  }

  public function removeFavHosts($hostId)
  {
    //! Not completed
    $index = array_search($hostId, $this->favHostsIds);
    if ($index !== false) {
      unset($this->favHostsIds[$index]);
      return true;
    }
    return false;
  }

  public function makeReview($rate, $hostId)
  {
    $review = new Review();
    $review->__construct3($hostId, $this->id, $rate);
    return $review;
  }

  //! Adding updateReservation Fucntion

  public function makeReservation($hostId, $actionId, $status, $startDate, $endDate)
  {   
    $reservation = new Reservation();
    $this->reservationId = Reservation::makeReservation($this->id, $hostId, $status, $startDate, $endDate, $this->firstName, $actionId);
  }

  public function cancelReservation()
  {
    $this->reservationId = null;
    ReservationDB::delete($this->reservationId);
  }

  public function addFriend($friendId)
  {
    $friend = new Traveller();
    $friend->getOne($friendId);
    array_push($this->friendsIds, $friendId);
    //! addFriend function from salah
  }

  public function removeFriend($friendId)
  {
    $index = array_search($friendId, $this->friendsIds);
    if ($index !== false) {
      unset($this->friendsIds[$index]);
      FriendDB::delete($friendId);
      return true;
    }
    return false;
    //! removeFriend function from salah
  }

  public function getOne($id)
  {
    $traveller = TravellerDB::getOne($id);
    extract($traveller);
    $this->id = $id;
    $this->firstName = $f_name;
    $this->lastName = $l_name;
    $this->username = $username;
    $this->password = $password;
    $this->type = $type;
    $this->email = $email;
    $this->phoneNumber = $phone_num;
    $this->country = $country;
    $this->profilePhoto = $profilePhoto;
    $this->coverPhoto = $coverPhoto;
    $this->service['id'] = $services['Id'];
    $this->service['name'] = $services['name'];
    //! favHosts, travellerFriendIds
  }

  public static function search($attributes, $skip, $limit)
  {
    $travellers = TravellerDB::search($attributes, $skip, $limit);
    return $travellers;
  }

  public function makeComment($travellerId, $hostId, $travellerName, $actionId)
  {
    $content = "{$travellerName} comment at your post";
    $action = 2;

    Notification::makeNoti($travellerId, $hostId, $content, $action, $actionId);
  }

  public function makeLove($travellerId, $hostId, $travellerName, $actionId)
  {
    $content = "{$travellerName} love your post";
    $action = 3;

    Notification::makeNoti($travellerId, $hostId, $content, $action, $actionId);
  }

  public function getNotification(){
    return Notification::getAll($this->id);
  }


}