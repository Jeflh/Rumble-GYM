<?php
class Conectar{

  public static function conexion(){

    $host = "localhost";
    $user = "root";
    $pass = "root";
    $db = "gimnasio";

    $conexion = new mysqli($host, $user, $pass, $db);
    $conexion->query("SET NAMES 'utf8'");
    return $conexion;

  }
}
?>