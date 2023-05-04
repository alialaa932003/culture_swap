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
  private $action;   
  private $content; 
  private $status;


  public function __construct()
  {
  
  }


  //// add fun 
  public  function Add($key)
  { 
            
    $db  = new NotificationDB();
    $id =   $db->add($key); 

    extract($key);

    $this->id = $id;
    $this->senderId = $senderId;
    $this->recieverId = $recieverId;
    $this->content = $content;
    $this->action = $action;
    

    if (isset($id))
      return $id; 
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



  // delete fun

  public static function delete($id, $user_id)
  {
   
   return  NotificationDB::delete($id, $user_id);

  }


 
  // Getters 
  public static function getAll($user_id) 
  {
    return $allNotifications  = NotificationDB::getAll($user_id);
  }

  public static function getSenderId($id,$user_id)
  {

    $noti = Notification::get_Detailed_Noti($id,$user_id);
    return  $noti['sender_id'];
  }

  public static function getRecieverId($id,$user_id)
  {

    $noti = Notification::get_Detailed_Noti($id,$user_id);
    return  $noti['reciever_id'];
  }

  public static function getContent($id,$user_id)
  {
    $noti = Notification::get_Detailed_Noti($id,$user_id);
    return  $noti['content'];
  }


  public static function getAction($id,$user_id)
  {
    $noti = Notification::get_Detailed_Noti($id,$user_id);
    return  $noti['action'];
  }


  public static function get_Detailed_Noti($id,$user_id)
  {

    return $detailedNotification  = NotificationDB::getOne($id,$user_id);
  }



}


