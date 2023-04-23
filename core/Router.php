<?php
namespace core;

    class Router {
        protected $routes = [];

        public function add($method,$uri,$controller)
        {
            $this->routes[] = [
                'uri' => $uri,
                'controller' => $controller,
                'method' => $method,
            ];
        }

        public function get($uri , $controller ){
            $this->add('GET',$uri,$controller);
        }

        public function post($uri , $controller ){
            $this->add('POST',$uri,$controller);
        }

        public function delete($uri , $controller ){
            $this->add('DELETE',$uri,$controller);
        }

        public function patch( $uri , $controller){
            $this->add('PATCH',$uri,$controller);
        }
        public function put( $uri , $controller){
            $this->add('PUT',$uri,$controller);
        }
        public function route ($uri,$method){

            foreach($this->routes as $route){
                if($route['uri'] == $uri && $route['method']==strtoupper($method)){
                    return require base_path($route['controller']);
                }
            }
        }

        protected function abort($code=404){
            http_response_code($code);

                require base_path("views/error$code.php");
                die();
        }

    }

    // $uri =parse_url( $_SERVER['REQUEST_URI'])['path'];
    // $conf = require(base_path('config.php'));
    // $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
 
    // $url = $protocol . $_SERVER['HTTP_HOST'] . parse_url($_SERVER['REQUEST_URI'])['path'];
    // $uri = str_replace($conf['base_urll'],"",$url);
    // $routes = require(base_path('routes.php'));
    // if(array_key_exists($uri,$routes)){
    //     require $routes[$uri];
    // }else{
    //     // echo http_response_code();
    //     // echo"ali";
    
    //     abort(404);
    // }

?>