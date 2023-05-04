<?php

namespace core\Classes;
use core\Classes\DB\ReviewDB;



class Review {
    private $id;
    private $hostId;
    private $travellerId;
    private $rate;
    // constractors 
    public function __construct1() {
        
    }
    
    public function __construct2(int $hostId, int $travellerId) {
        $this->hostId = $hostId;
        $this->travellerId = $travellerId;
        $this->id=ReviewDB::add($this);
    }
    
    public function __construct3(int $hostId, int $travellerId, int $rate) {
        $this->hostId = $hostId;
        $this->travellerId = $travellerId;
        $this->rate = $rate;
        $this->id=ReviewDB::add($this);
      
    }
    
    public function add(array $data) {
        $id=ReviewDB::add($data);
        return $this->id;
    }
    
    public function delete(int $id) {
        ReviewDB::delete($id);
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getHostId() {
        return $this->hostId;
    }
    
    public function setHostId(int $id) {
        $this->hostId = $id;
        ReviewDB::update($this);
    }
    
    public function getTravellerId() {
        return $this->travellerId;
        
    }
    
    public function setTravellerId(int $id) {
        $this->travellerId = $id;
        ReviewDB::update($this);
    }
    
    public function getRate() {
        return $this->rate;
    }
    
    public function setRate(int $rate) {
        $this->rate = $rate;
        ReviewDB::update($this);
    }
    
    public function getOne(int $reviewId) {
        $result= ReviewDB::getOne($reviewId);
        return $result;
    }
    
    public function search(string $condition ,int $skip ,int $limit ) {
        $result []= ReviewDB::search($condition,$skip,$limit);
        return $result;
    }
}
