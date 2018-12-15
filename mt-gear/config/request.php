<?php namespace Config;

  class Request{
    private $controller;
    private $method;
    private $argument;  //variables as private

    public function __contruct(){
      if(isset($_GET['url'])){ //url -> sanitazed url -> no / -> url array
        $route = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
        $route = explode("/", $route);
        $route =array_filter($route);
        if (empty($route)){ //if route is empty controller will be index
          $this->controller = "index";
        } else {// else controller will be route in lowercase
          $this->controller = strtolower(array_shift($route));
        }

        $this->method = strtolower(array_shift($route)); //method as route

        if(!$this->method){ //if variable diferent to method(route), method will be index
          $this->method ="index";
        }
        $this->argument = $route; //argument as route
      } else{
        $this->controller = "index";
        $this->method="index";
      }
    }

    public function get_controller(){
      return $this->controller;
    }

    public function get_method(){
      return $this->method;
    }

    public function get_argument(){
      return $this->argument;
    }
  }
?>
