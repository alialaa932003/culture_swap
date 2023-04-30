<?php
namespace core\Classes;

class TravellerVip extends Traveller{
  private $cardNumber;
  private $cvc;
  private $expirationDate;
  private $paymentOption;

  public function __construct(){

  }

  public function __construct1($username, $password, $type,$cardNumber, $cvc, $expirationDate , $paymentOption){
    parent::__construct1($username, $password, $type);
    $this->cardNumber = $cardNumber;
    $this->cvc = $cvc;
    $this->expirationDate = $expirationDate;
    $this->paymentOption = $paymentOption;
  }

  public function __construct2($name, $username, $password, $type, $email, $phoneNumber, $country, $service,$cardNumber, $cvc, $expirationDate , $paymentOption){
    parent::__construct2($name, $username, $password, $type, $email, $phoneNumber, $country, $service);
    $this->cardNumber = $cardNumber; 
    $this->cvc = $cvc;
    $this->expirationDate = $expirationDate;
    $this->paymentOption = $paymentOption;
  }


  public function getCardNumber(){
    return $this->cardNumber;
  }

  public function setCardNumber($cardNumber){
    $this->cardNumber = $cardNumber;
  }

  public function getCvc(){
    return $this->cvc;
  }

  public function setCvc($cvc){
    $this->cvc = $cvc;
  }

  public function getExpirationDate(){
    return $this->expirationDate;
  }

  public function setExpirationDate($date){
    $this->expirationDate = $date;
  }

  public function getPaymentOption(){
    return $this->paymentOption;
  }

  public function setPaymentOption($paymentOption){
    $this->paymentOption = $paymentOption;
  }

}