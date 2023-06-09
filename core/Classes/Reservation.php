<?php

namespace core\Classes;

use core\Classes\Notification;
use core\Classes\DB\ReservationDB;


class Reservation
{
    private $id;
    private $travellerId;
    private $hostId;
    private $start_date;
    private $end_date;
    private $noti;
    private $status;  // 0->pending , 1 -> accept , -1 -> reject




    public function __construct()
    {
    }

    public function Add($data)
    {

        $rs = new ReservationDB();
        $id = $rs->add($data);

        extract($data);

        $this->id = $id;

        $this->travellerId = $traveller_id;
        $this->hostId = $host_id;
        $this->status = $Status;
        $this->start_date = $Start_date;
        $this->end_date = $end_date;


        if (isset($id))
            return $id;
        else
            return -1;
    }


    public static function makeReservation($traveller_id, $host_id, $status, $startDate, $endDate, $tvname)
    {
        $content = "the traveller $tvname want to join to you";
        $action = 1; //reservation 


        $rv_id =  ReservationDB::add([
            'host_id' => $host_id,
            'traveller_id' => $traveller_id,
            'Status' => $status,
            'Start_date' => $startDate,
            'end_date' => $endDate
        ]);



        Notification::makeNoti($traveller_id, $host_id, $content, $action,  $rv_id );

        return $rv_id;
    }

    public static function updateStatus($id, $act_val)
    {
   
        $res = Reservation::get_Detailed_Res($id);
        $res['Status'] = $act_val;

        ReservationDB::update([
          'key' => 'Status',
           'value' => $act_val,
           'Id' => $id
        ]);
        
        $action = 1; // reservation
        $hst_id =  $res['host_id'];

        // need host name
        $name = Host::getNAme($hst_id);

        if ($act_val == 1) {

            $content = " $name Accept your reservation "; //accept
        }
        if ($act_val == 2)
            $content = " $name Reject your reservation "; //reject

           
        Notification::makeNoti($res['host_id'], $res['traveller_id'], $content, $action, $id);
    }





    public static function getStDate($id)
    {
        $res = Reservation::get_Detailed_Res($id);
        return $res['Start_date'];
    }

    public static function getEndDate($id)
    {

        $res = Reservation::get_Detailed_Res($id);
        return $res['end_date'];
    }




    public static function getTravellerId($id)
    {
        $res = Reservation::get_Detailed_Res($id);
        return  $res['traveller_id'];
    }
    public static function getHostId($id)
    {
        $res = Reservation::get_Detailed_Res($id);
        return  $res['host_id'];
    }

    public static function getStatus($id)
    {
        $res = Reservation::get_Detailed_Res($id);
        return  $res['status'];
    }

    public static function get_Detailed_Res($id)
    {

        return    ReservationDB::getOne($id);
    }


    public static  function duration($stDate, $endDate)
    {

        $now = new \DateTime("$stDate");
        $date = new \DateTime("$endDate");
        $diff = $now->diff($date);
        $str = $diff->format('%a Days and %h Hours') . " remain ";

        return $str;
    }
}
