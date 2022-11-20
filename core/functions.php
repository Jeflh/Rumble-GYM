<?php

function autenticado() : bool {
  session_start();

  if(isset($_SESSION['login'])){
    $auth = $_SESSION['login'];

    if($auth){
      return true;
    }
  }
  return false;
}

function fechaEnRango($fecha_inicio, $fecha_fin){

  date_default_timezone_set('America/Mexico_City');

  $fecha_inicio = strtotime($fecha_inicio);
  $fecha_fin = strtotime($fecha_fin); 
  $fecha = strtotime(date('Y-m-d'));

  if(($fecha >= $fecha_inicio) && ($fecha <= $fecha_fin)) {
    return true;
  } else {
    return false;
  }
}

?>