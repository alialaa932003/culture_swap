<?php

namespace core\Middleware;

class UserAuth
{

  public function handle()
  {
    if ($_SESSION['user']['type'] !== 'host' || $_SESSION['user']['type'] !== 'traveller') {
      header('location: /culture_swap/');
      exit();
    }
  }

}