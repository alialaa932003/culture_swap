<?php
namespace core;

use core\Middleware\Middleware;

class Router
{
  protected $routes = [];

  public function add($method, $uri, $controller)
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => $method,
    ];
  }

  public function get($uri, $controller)
  {
    $this->add('GET', $uri, $controller);
    return $this;
  }

  public function post($uri, $controller)
  {
    $this->add('POST', $uri, $controller);
    return $this;
  }

  public function delete($uri, $controller)
  {
    $this->add('DELETE', $uri, $controller);
    return $this;
  }

  public function patch($uri, $controller)
  {
    $this->add('PATCH', $uri, $controller);
    return $this;
  }
  public function put($uri, $controller)
  {
    $this->add('PUT', $uri, $controller);
    return $this;
  }
  public function only($key)
  {
    $this->routes[array_key_last($this->routes)]['middleware'] = $key;
  }
  public function route($uri, $method)
  {

    foreach ($this->routes as $route) {
      if ($route['uri'] == $uri && $route['method'] == strtoupper($method)) {
        // Apply the middleware
        Middleware::resolve($route['middleware']);
        return require base_path($route['controller']);
      }
    }
    abort();
  }

  protected function abort($code = 404)
  {
    http_response_code($code);

    require base_path("views/error$code.php");
    die();
  }

}



?>