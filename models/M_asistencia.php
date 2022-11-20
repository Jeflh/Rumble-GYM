<?php

class AsistenciaModel{
  private $db;

  public function __construct(){
    $this->db = Conectar::conexion();
  }
}


?>