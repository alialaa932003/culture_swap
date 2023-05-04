<?php

namespace core\Classes;
use core\Classes\DB\PostDB;
use core\Classes\DB\NotificationDB;


// db classes host && traveler && notifcation &&post 

abstract class User{

    private int $id;
    private string $firstName;
    private string $lastName;
    private string $username;
    private string $password;
    private string $email;
    private int $phoneNumber;
    private string $profilePhoto;
    private string $coverPhoto;
    private string $country;
    private array $notifications = [];
    private array $notificationsId =[];
    private int $type;

    //! first Constructors:
    public function __construct1() {
        
    }
    //! sconde Constructors:
    public function __construct2(string $name, string $username, string $pass, string $email, int $phoneNumber, string $profilePhoto, string $country, int $type) {
      $this->firstName = $name;
      $this->username = $username;
      $this->password = $pass;
      $this->email = $email;
      $this->phoneNumber = $phoneNumber;
      $this->profilePhoto = $profilePhoto;
      $this->country = $country;
      $this->type = $type;
    }
  
   abstract public function add(array $data) ;
  
   abstract public function delete(int $id);
  
    public function getId() {
      return $this->id;
    }
  
    public function getFirstName() {
      return $this->firstName;
    }
  
    public function setFirstName(string $firstName) {
      $this->firstName = $firstName;
    }
  
    public function getLastName() {
      return $this->lastName;
    }
  
    public function setLastName(string $lastName) {
      $this->lastName = $lastName;
    }
  
    public function getUserName() {
      return $this->username;
    }
  
    public function setUserName(string $username) {
      $this->username = $username;
    }
  
    public function getPassword() {
      return $this->password;
    }
  
    public function setPassword(string $password) {
      $this->password = $password;
    }
  
    public function getEmail() {
      return $this->email;
    }
  
    public function setEmail(string $email) {
      $this->email = $email;
    }
  
    public function getPhoneNumber() {
      return $this->phoneNumber;
    }
  
    public function setPhoneNumber(int $phoneNumber) {
      $this->phoneNumber = $phoneNumber;
    }
  
    public function getProfilePhoto() {
      return $this->profilePhoto;
    }
  
    public function setProfilePhoto(string $profilePhoto) {
      $this->profilePhoto = $profilePhoto;
    }
  
    public function getCoverPhoto(){
      return $this->coverPhoto;
    }
  
    public function setCoverPhoto(string $coverPhoto) {
      $this->coverPhoto = $coverPhoto;
    }
  
    public function getCountry() {
      return $this->country;
    }
  
    public function setCountry(string $country) {
      $this->country = $country;
    }
  
    public function getType(){
      return $this->type;
    }
  
    public function  getNotification() {
      $this->notifications[]=Notification::getAll($this->$id);
      
      return $this->notifications;

    }
    public function  addNotification( $notificationId) {
      $this->notificationsId[] = $notificationId;

    }
  
    public function addPost( $content,$photos,$videos) {
      $post=new Post();
      $id=PostDB::add(
        ['content'=>$content,
      'photos'=>$photos,
      'videos'=>$videos]
      );
      
      post->add( ['content'=>$content,
      'photos'=>$photos,
      'videos'=>$videos]);

      return $post;
    }
    public function removePost( $postId) {

      PostDB::delete($postId);
    }
   
    public static function login(string $username, string $password) {
      // implementation details
    }
  
    public static function signUp(User $user) {
      // implementation details
    }
  
    public static function logout(): void {
      // implementation details
    }
  
    // abstract mathpds 
    abstract public  function getOne( $username) ;
  
   abstract   public  function search ( $condition); 
    
}