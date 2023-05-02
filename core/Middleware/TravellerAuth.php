<?php

namespace core\Middleware;

class TravellerAuth
{

  public function handle()
  {
    if ($_SESSION['user']['type'] !== 'traveller') {
      header('location: /culture_swap/');
      exit();
    }
  }

}