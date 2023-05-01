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
    $id = travellerVipDB::add($data);
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
    $this->service = $service_name;
    $this->cardNumber = $card_num;
    $this->cvc = $cvc;
    $this->expirationDate = $expiration_date;
    $this->paymentOption = $payment_option;
  }

  public function delete($id)
  {
    travellerVipDB::delete($id);
  }

  public function getCardNumber(){
    return $this->cardNumber;
  }

  public function setCardNumber($cardNumber){
    travellerVipDB::update($this->id, 'card_num', $cardNumber);
    $this->service = $service;
    $this->cardNumber = $cardNumber;
  }

  public function getCvc(){
    return $this->cvc;
  }

  public function setCvc($cvc){
    travellerVipDB::update($this->id, 'card_num', $cvc);
    $this->cvc = $cvc;
  }

  public function getExpirationDate(){
    return $this->expirationDate;
  }

  public function setExpirationDate($date){
    travellerVipDB::update($this->id, 'expiration_date', $date);
    $this->expirationDate = $date;
  }

  public function getPaymentOption(){
    return $this->paymentOption;
  }

  public function setPaymentOption($paymentOption){
    travellerVipDB::update($this->id, 'payment_option', $paymentOption);
    $this->paymentOption = $paymentOption;
  }

}