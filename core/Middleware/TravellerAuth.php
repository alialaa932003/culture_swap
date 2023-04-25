<?php

namespace core\Middleware;

class TravellerAuth
{

  public function handle()
  {
    if ($_SESSION['user'] !== 'traveller') {
      header('location: /culture_swap/');
      exit();
    }
  }

}