<?php

namespace core\Classes;

use DateTime;

class Duration
{
  private $id;
  private $parentId;
  private $startDate;
  private $endDate;
  public function add($data)
  {
    $id = DurationDB::add($data);
    extract($data);
    $this->id = $id;
    $this->parentId = $parent_id;
    $this->startDate = $start_date;
    $this->endDate = $end_date;

  }

  public function delete($id)
  {
    DuratuinDB::delete($id);
  }

  public function getId()
  {
    return $this->id;
  }

  public function getParentId()
  {
    return $this->parentId;
  }

  public function setParentId($id)
  {
    DurationDB::update($this->id, 'parent_id', $id);
    $this->parentId = $id;
  }

  public function getStartDate()
  {
    return $this->startDate;
  }

  public function setStartDate($startDate)
  {
    DurationDB::update($this->id, 'start_date', $startDate);
    $this->startDate = $startDate;
  }

  public function getEndDate()
  {
    return $this->endDate;
  }

  public function getDuration()
  {
    $startDate = DateTime::createFromFormat('Y-m-d', $this->startDate);
    $endDate = DateTime::createFromFormat('Y-m-d', $this->endDate);
    $duration = $startDate->diff($endDate);
    return $duration->days;
  }

  public function getOne($durationId)
  {
    $duration = DurationDB::search("id = {$durationId}", 0, 1);
    $this->id = $duration->id;
    $this->parentId = $duration->parent_id;
    $this->startDate = $duration->start_date;
    $this->endDate = $duration->end_date;
  }

  public static function search($condition)
  {
    $durations = DurationDB::search("{$condition}", 0, 1000);
    return $durations;
  }
}