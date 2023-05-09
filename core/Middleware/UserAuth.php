<?php

namespace core\Middleware;

class UserAuth
{

  public function handle()
  {
    if (!$_SESSION['user']['type']) {
      header('location: /culture_swap/');
      exit();
    }
  }

}