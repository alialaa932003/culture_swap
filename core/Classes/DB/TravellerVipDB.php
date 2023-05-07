<?php

namespace core\Classes\DB;

use core\Database;

class TravellerVipDB extends TravellerDB
{

    function __construct()
    {
    }

    public static function add($data)
    {
        $id = parent::add($data);
        extract($data);

        Database::getInstance()->query("INSERT INTO traveller_vip  (traveller_id,payment_option,card_number,cvc_number,exp_date)
            values(:id,:payment_option,:card_number,:cvc_number,:exp_date)
        ", [
            'id' => $id,
            'payment_option' => $payment_option,
            'card_number' => $card_number,
            'cvc_number' => $cvc_number,
            'exp_date' => $exp_date,
        ]);
        return Database::getInstance()->getLastRecordIdAdded("traveller");
    }
    public static function update($data)
    {
        extract($data);

        Database::getInstance()->query("UPDATE traveller_vip SET $key = :value WHERE traveller_id = :id ", [
            'value' => $value,
            'id' => $id
        ]);
    }
    public static function  getOne($id)
    {
        return Database::getInstance()->query("SELECT * FROM _user INNER JOIN traveller_vip ON traveller_vip.traveller_id = _user.id   WHERE _user.id = :id", ['id' => $id])->find();
    }
}
