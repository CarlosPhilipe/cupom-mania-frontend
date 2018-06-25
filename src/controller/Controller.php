<?php

class Controller {

  public $action;

  public $controller;

  public $id;

  function __construct() {
    $this->action = $_GET['action'];
    $this->controller = $_GET['controller'];
    $this->id = $_GET['id'];
   }
}

?>
