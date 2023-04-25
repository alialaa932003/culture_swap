<?php

namespace core\Middleware;

class GuestAuth
{

  public function handle()
  {
    if ($_SESSION['user'] ?? false) {
      header('location: /culture_swap/');
      exit();
    }
  }

}