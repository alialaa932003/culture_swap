<?php

namespace core\Middleware;

class GuestAuth
{

  public function handle()
  {
    if ($_SESSION['user']['type'] ?? false) {
      header('location: /culture_swap/');
      exit();
    }
  }

}