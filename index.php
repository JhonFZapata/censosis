<?php
require_once('db/mysql.php');
require_once('controller/controller.php');
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

    // instancio la clase Cliente_controlador() y nombro al objeto controlador
$controlador = new Controlador();

  // verifica si existe la variable b
  if (!empty($_REQUEST['m'])) {
// creo una variable y la llamo metodo y le asigno el valor que venga en b
$metodo = $_REQUEST['m'];

//verifico si existe un metodo con el mismo nombre de la variable en la clase Controlador
    if (method_exists($controlador, $metodo)) {
      // si existe que lo ejecute
      $controlador->$metodo();
    }else {
      // Si no existe que me ejecute el metodo por defecto
      $controlador->fourzerofour();
    }
  }else {
    $controlador->login();
  }
 ?>