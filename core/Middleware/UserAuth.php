<?php

namespace core\Middleware;

class UserAuth
{

  public function handle()
  {
    if ($_SESSION['user'] !== 'host' || $_SESSION['user'] !== 'traveller') {
      header('location: /culture_swap/');
      exit();
    }
  }

}