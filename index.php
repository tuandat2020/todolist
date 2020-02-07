<?php
// Data connection settings are included in the
// DBMS: Mysql.
require_once 'model/database.php';

//To register products it is necessary to start the suppliers
//of them, therefore the controller variable for this
//exercise starts with the 'todos'.
$controller = 'todos';

// All this logic will play the role of a FrontController
if (!isset($_REQUEST['c'])) {
  // Call from the home page
  require_once "controller/$controller.controller.php";
  $controller = ucwords($controller) . 'Controller';
  $controller = new $controller;
  $controller->Index();
} else {
  // Get the driver to load
  $controller = strtolower($_REQUEST['c']);
  $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
  // Instance the controller
  require_once "controller/$controller.controller.php";
  $controller = ucwords($controller) . 'Controller';
  $controller = new $controller;

  // Call the action
  call_user_func(array($controller, $accion));
}
