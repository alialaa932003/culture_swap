<?php
namespace core\Middleware;

class Middleware
{
  public const MAP = [
    'guest' => GuestAuth::class,
    'host' => HostAuth::class,
    'traveller' => TravellerAuth::class,
  ];

  public static function resolve($key)
  {
    if (!$key) {
      return;
    }

    $middleware = static::MAP[$key]?? false;

    if (!$middleware) {
      throw new \Exception('No matching middleware found for key ' . $key);
    }

    (new $middleware)->handle();
  }

}