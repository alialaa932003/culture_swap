<?php

namespace core\Middleware;

class HostAuth
{

  public function handle()
  {
    if ($_SESSION['user'] !== 'host') {
      header('location: /culture_swap/');
      exit();
    }
  }

}