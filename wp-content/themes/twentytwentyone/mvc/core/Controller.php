<?php
  class Controller {
    public function service($service) {
      require_once (__DIR__.'/../services/'.$service.'.php');
      return new $service;
    }

    public function view($view, $data = []) {
      require_once(__DIR__.'/../views/'.$view.'/index.php');
    }
  }
?>