<?php

namespace core\Classes;

use core\Classes\comment;
//use core\Classes\DB\PostDB;
//use core\Classes\DB\NotificationDB;
use core\Classes\post;

// db classes host && traveler && notifcation &&post 

abstract class User{

    protected int $id;
    protected string $firstName;
    protected string $lastName;
    protected string $username;
    protected string $password;
    protected string $email;
    protected int $phoneNumber;
    protected string $profilePhoto;
    protected string $coverPhoto;
    protected string $country;
    protected array $notification = [];
    protected int $type;


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

    abstract public function  getNotification(); 
   abstract public  function getOne( $username) ; 
   abstract   public static function search ( $attributes, $skip, $limit); 
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
  
  
    public function addPost( $content,$photos,$videos) {
     $post = new Post();
      $data= ['content'=>$content,'photos'=>$photos,'videos'=>$videos];
      $post->add($data);
      return $post;
    }
    public function removePost( $postId) {

      Post::delete($postId);
    }
   
    public static function login(string $username, string $password) {
      // implementation details
      //$this->username=$username;
     // $this->password=$password;
    }
  
    public static function signUp(User $user) {

      // implementation details
    }
  
    public static function logout(): void {
     
    }
    public function addComment ( $content,$postId) {
      $data= ['content'=>$content,'postId'=>$postId];
      $c=new comment();
       $c->add($data );
  
    }
    
    public function DeleteComment ( $comentId) {
       Comment::delete($comentId );
  
    }





}