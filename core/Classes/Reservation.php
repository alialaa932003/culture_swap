<?php

namespace core\Classes;
use core\Classes\Notification;
use core\Classes\DB\ReservationDB;


class Reservation
{
    private $id ;
    private $travellerId ;
    private $hostId ;
    private $start_date ;
    private $end_date ;
    private $noti ;
    private $status ;




    public function __construct(){

    }

    public function Add($data){
      
     $rs= new ReservationDB();
     $id = $rs->add($data);

     extract($data);

    $this->id = $id;
    $this->travellerId = $travellerId;
    $this->hostId = $hostId;
    $this->status = $status;
   

    if (isset($id))
      return $id;
    else 
      return -1;
    } 



    public static function makeReservation($travelelr_id ,$host_id,$status, $startDate, $endDate, $tvname,$action_id){
     $content = "the traveller $tvname want to join to you";
     $action = 1 ; //reservation 
        
     ReservationDB::add([
      'host_id' => $host_id,
      'travelelr_id' => $travelelr_id,
      'Status' => $status,
      'Start_date' => $startDate,
      'end_date' => $endDate
    ]);

      Notification::makeNoti($travelelr_id,$host_id,$content,$action,$action_id);


    }

    

   /* public static updateStatus(){


    }  */

    public static function getId($id)
    {
      $res = Reservation::get_Detailed_Res($id);
      return  $res['Id'];
    }

    public static function getTravellerId($travellerId)
    {
      $res = Reservation::get_Detailed_Res($travellerId);
      return  $res['traveller_id'];
    }
    public static function getHostId($hostId)
    {
      $res = Reservation::get_Detailed_Res($hostId);
      return  $res['host_id'];
    }
    public static function getStatus($status)
    {
      $res = Reservation::get_Detailed_Res($status);
      return  $res['status'];
    }

    public static function get_Detailed_Res($id){

     return  $detailedReservation =  ReservationDB::getOne($id);
       
    }


    public static function duration(){

    }


}
