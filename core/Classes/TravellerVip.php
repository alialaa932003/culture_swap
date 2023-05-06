<?php
namespace core\Classes;

class TravellerVip extends Traveller{
  private $cardNumber;
  private $cvc;
  private $expirationDate;
  private $paymentOption;

  public function __construct(){

  }

  public function add($data)
  {
    $id = TravellerVipDB::add($data);
    parent::add($data);
    extract($data);
    $this->cardNumber = $card_num;
    $this->cvc = $cvc;
    $this->expirationDate = $expiration_date;
    $this->paymentOption = $payment_option;
  }

  public function delete($id)
  {
    TravellerVipDB::delete($id);
  }

  public function getCardNumber(){
    return $this->cardNumber;
  }

  public function setCardNumber($cardNumber){
    TravellerVipDB::update([
      'id' => $this->id,
      'key' => 'card_number',
      'value' => $cardNumber
    ]);
    $this->cardNumber = $cardNumber;
  }

  public function getCvc(){
    return $this->cvc;
  }

  public function setCvc($cvc){
    TravellerVipDB::update([
      'id' => $this->id,
      'key' => 'cvc_number',
      'value' => $cvc
    ]);
    $this->cvc = $cvc;
  }

  public function getExpirationDate(){
    return $this->expirationDate;
  }

  public function setExpirationDate($date){
    TravellerVipDB::update([
      'id' => $this->id,
      'key' => 'expiration_date',
      'value' => $date
    ]);
    $this->expirationDate = $date;
  }

  public function getPaymentOption(){
    return $this->paymentOption;
  }

  public function setPaymentOption($paymentOption){
    TravellerVipDB::update([
      'id' => $this->id,
      'key' => 'payment_option',
      'value' => $paymentOption
    ]);
    $this->paymentOption = $paymentOption;
  }

  public function getOne($id)
  {
    $travellerVip = TravelelrVipDB::getOne($id);
    parent::add($travellerVip);
    extract($travellerVip);
    $this->cvc = $cvc;
    $this->expirationDate = $expiration_date;
    $this->paymentOption = $payment_option;
  }

  public static function search($attributes, $skip, $limit)
  {
    $travellers = TravelelrVipDB::search($attributes, $skip, $limit);
    return $travellers;
  }
} 