<?php

namespace core\Classes;

use core\Classes\DB\ReservationDB;
use core\Classes\DB\ReviewDB;
use core\Classes\DB\TravellerDB;


class Traveller extends User
{
  // Data fields

  private $services = [];
  private $friendsIds = [];
  private $favHostsIds = [];
  private $notificationIds = [];
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
    $this->id = $id ?? "";
    $this->username = $username ?? "";
    $this->password = $password ?? "";
    $this->firstName = $first_name ?? "";
    $this->lastName = $last_name ?? "";
    $this->password = $password ?? "";
    $this->type = $type ?? "";
    $this->email = $email ?? "";
    $this->phoneNumber = $phone_num ?? "";
    $this->country = $country ?? "";
    $this->profilePhoto = $profile_img ?? "";
    $this->coverPhoto = $cover_img ?? "";
    if (count($services) != 0) {
      foreach ($services as $i => $service) {
        $this->services[$i]['id'] = $service['id'];
        $this->services[$i]['name'] = $service['service'];
      }
    }
  }

  public function delete($id)
  {
    TravellerDB::delete($id);
  }

  // Methods
  public function getService()
  { // Will return associative array
    return $this->services;
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
    $this->services[]['name'] = $service['name'];
    $this->services[]['id'] = $service['id'];
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
    TravellerDB::addFavHost($this->id, $hostId);
    array_push($this->favHostsIds, $hostId);
  }

  public function removeFavHosts($hostId)
  {
    $index = array_search($hostId, $this->favHostsIds);
    if ($index !== false) {
      unset($this->favHostsIds[$index]);
      TravellerDB::removeFavHost($this->id, $hostId);
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


  public function makeReservation($hostId, $actionId, $status, $startDate, $endDate)
  {
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
    TravellerDB::addFriend($this->id, $friendId);
  }

  public function removeFriend($friendId)
  {
    $index = array_search($friendId, $this->friendsIds);
    if ($index !== false) {
      unset($this->friendsIds[$index]);
      TravellerDB::removeFriend($this->id, $friendId);
      return true;
    }
    return false;
  }

  public function getOne($id)
  {
    $traveller = TravellerDB::getOne($id);
    extract($traveller);
    $this->id = $Id ?? "";
    $this->firstName = $first_name ?? "";
    $this->lastName = $last_name ?? "";
    $this->type = $type ?? "";
    $this->email = $email ?? "";
    $this->phoneNumber = $phone_num ?? "";
    $this->country = $country ?? "";
    $this->profilePhoto = $profile_img ?? "";
    $this->coverPhoto = $cover_img ?? "";
    if ($services) {
      foreach ($services as $i => $service) {
        $this->services[$i]['id'] = $service['Id'];
        $this->services[$i]['name'] = $service['name'];
      }
    }
    if ($notificationIds) {
      foreach ($notificationIds as $i => $notification) {
        $this->notificationIds[$i] = $notification['id'];
      }
    }
    if ($favHostsIds) {
      foreach ($favHostsIds as $i => $favHost) {
        $this->favHostsIds[$i] = $favHost['fav_host_id'];
      }
    }
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

  public function addService($serviceId, $serviceName)
  {
    TravellerDB::addService($this->id, $serviceId);
    $this->services[]['id'] = $serviceId;
    $this->services[]['name'] = $serviceName;
  }

  public function removeService($serviceId)
  {
    TravellerDB::removeService($this->id, $serviceId);
    foreach ($this->services as $i => $service) {
      if ($service['id'] == $serviceId) {
        unset($services[$i]);
      }
    }
  }
  public function getNotification()
  {
    return Notification::getAll($this->id);
  }


}