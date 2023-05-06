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
        parent::add($data);
        extract($data);

        Database::getInstance()->query("INSERT INTO traveller_vip  (traveller_id,payment_option,card_number,cvc_number,exp_date)
            values(:id,:payment_option,:card_number,:cvc_number,:exp_date)
        ", [
            'id' => 'traveller_id',
            'payment_option' => 'payment_option',
            'card_number' => 'card_number',
            'cvc_number' => 'cvc_number',
            'exp_date' => 'exp_date',
        ]);
        return Database::getInstance()->getLastRecordIdAdded("traveller");
    }
    public static function update($data)
    {
        extract($data);

        Database::getInstance()->query("UPDATE traveller_vip SET $key = :value WHERE id = :id ", [
            'value' => $value,
            'id' => $id
        ]);
    }
}
