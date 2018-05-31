<?php
  class Request{
    private $section;
    private $page;
    private $argument;

    function __construct(){
      if (isset($_GET['url'])) {
        $route = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
        $route = explode('/', $route);
        $route = array_filter($route);
        if ($route[0] == 'index.php') {
          $this->section = 'home';
        }
        elseif(count($route) == 1){
          $this->section = strtolower(array_shift($route));
        }
        else {
          $this->section = strtolower(array_shift($route));
          $this->page = $route[0];
        }
        $this->argument = $route;
      }
      else {
        $this->page = 'home';
      }
    }

    public function getSection(){
			return $this->section;
		}

		public function getPage(){
			return $this->page;
		}

		public function getArgument(){
			return $this->argument;
		}
  }
?>
