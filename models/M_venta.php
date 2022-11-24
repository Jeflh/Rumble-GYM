<?php

class VentaModel{
  private $db;

  private $fecha_venta;
  private $monto_venta;

  private $listaVentas;

  public function __construct(){
    $this->db = Conectar::conexion();
    $this->listaVentas = array();
  }

  
}

?>