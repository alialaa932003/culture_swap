<?php
namespace core\Classes;

use core\Classes\DB\{
  TravellerDB,
  TravellerVipDB
};

class TravellerVip extends Traveller
{
  private $cardNumber;
  private $cvc;
  private $expirationDate;
  private $paymentOption;

  public function __construct()
  {

  }

  public function add($data)
  {
    $this->id = TravellerVipDB::add($data);
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
        $this->services[$i]['id'] = $service['service_id'];
        $this->services[$i]['name'] = $service['service'];
      }
    }
    $this->cardNumber = $card_number ?? "";
    $this->cvc = $cvc_number ?? "";
    $this->expirationDate = $exp_date ?? "";
    $this->paymentOption = $payment_option ?? "";
  }

  public function delete($id)
  {
    TravellerDB::delete($id);
  }

  public function getCardNumber()
  {
    return $this->cardNumber;
  }

  public function setCardNumber($cardNumber)
  {
    TravellerVipDB::update([
      'id' => $this->id,
      'key' => 'card_number',
      'value' => $cardNumber
    ]);
    $this->cardNumber = $cardNumber;
  }

  public function getCvc()
  {
    return $this->cvc;
  }

  public function setCvc($cvc)
  {
    TravellerVipDB::update([
      'id' => $this->id,
      'key' => 'cvc_number',
      'value' => $cvc
    ]);
    $this->cvc = $cvc;
  }

  public function getExpirationDate()
  {
    return $this->expirationDate;
  }

  public function setExpirationDate($date)
  {
    TravellerVipDB::update([
      'id' => $this->id,
      'key' => 'exp_date',
      'value' => $date
    ]);
    $this->expirationDate = $date;
  }

  public function getPaymentOption()
  {
    return $this->paymentOption;
  }

  public function setPaymentOption($paymentOption)
  {
    TravellerVipDB::update([
      'id' => $this->id,
      'key' => 'payment_option',
      'value' => $paymentOption
    ]);
    $this->paymentOption = $paymentOption;
  }

  public function getOne($id)
  {
    $traveller = TravellerVipDB::getOne($id);
    extract($traveller);
    $this->id = $Id ?? "";
    $this->firstName = $first_name ?? "";
    $this->lastName = $last_name ?? "";
    $this->type = $type ?? "";
    $this->email = $email ?? "";
    $this->phoneNumber = $phone_num ?? " ";
    $this->country = $country ?? "";
    $this->profilePhoto = $profile_img ?? "";
    $this->coverPhoto = $cover_img ?? "";
    $this->cardNumber = $card_number ?? "";
    $this->cvc = $cvc_number ?? "";
    $this->expirationDate = $exp_date ?? "";
    $this->paymentOption = $payment_option ?? "";
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
}