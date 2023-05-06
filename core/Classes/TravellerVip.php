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
    $travellerVip = TravellerVipDB::getOne($id);
    parent::add($travellerVip);
    extract($travellerVip);
    $this->cardNumber = $card_number ?? "";
    $this->cvc = $cvc_number ?? "";
    $this->expirationDate = $exp_date ?? "";
    $this->paymentOption = $payment_option ?? "";
  }

  public static function search($attributes, $skip, $limit)
  {
    $travellers = TravellerDB::search($attributes, $skip, $limit);
    return $travellers;
  }
}