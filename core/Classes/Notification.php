<?php
namespace core\Classes;
use core\Classes\User;
use core\Classes\DB\NotificationDB;

/**
 * Summary of Notification
**/


class Notification
{

  private $id;
  private $senderId;
  private $recieverId;
  private $action;  // reservation && comment 
  private $content; 
  private $status;


  public function __construct()
  {
  
  }


  //// add fun 
  public  function Add($key)
  { 
              // to make anotification
    $db  = new NotificationDB();
    $id =   $db->add($key); // call static method add in class NotificationDB

    extract($key);

    $this->id = $id;
    $this->senderId = $senderId;
    $this->recieverId = $recieverId;
    $this->content = $content;
    $this->action = $action;
    

    if (isset($id))
      return $id; // obj from class 
    else
      return -1;

  }

  //make Notification 

  public static function makeNoti($senderId,$recieverId,$content,$action,$action_id){
     // action
    // 1 -> resevation
    // 2 -> comment post
    // 3 -> love post
    // 4 -> review host
  
    $noti =   new Notification();
    $id = $noti -> Add(
    [
     'sender_id'=>$senderId,
     'reciever_id'=>$recieverId,
     'content'=>$content,
     'action'=>$action,
     'action_id'=>$action_id
    ]
  );
   

  }

  public static function getAll($user_id) 
  {

    return $allNotifications  = NotificationDB::getAll($user_id);


  }


  // delete fun

  public static function delete($user_id)
  {
   
   return  NotificationDB::delete($user_id);

  }


 

  public static function getSenderId($id)
  {

    $noti = Notification::get_Detailed_Noti($id);
    return  $noti['sender_id'];
  }

  public static function getRecieverId($id)
  {

    $noti = Notification::get_Detailed_Noti($id);
    return  $noti['reciever_id'];
  }

  public static function getContent($id)
  {
    $noti = Notification::get_Detailed_Noti($id);
    return  $noti['content'];
  }


  public static function getAction($id)
  {
    $noti = Notification::get_Detailed_Noti($id);
    return  $noti['action'];
  }


  public static function get_Detailed_Noti ($id)
  {

    return $detailedNotification  = NotificationDB::getOne($id);
  }



}


