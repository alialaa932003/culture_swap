<?php

namespace core\Middleware;

class HostAuth
{

  public function handle()
  {
    if ($_SESSION['user']['type'] !== 'host') {
      header('location: /culture_swap/');
      exit();
    }
  }

}