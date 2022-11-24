<?php

class VentaModel{
  private $db;

  private $id_empleado;
  private $fecha_venta;
  private $monto_venta;

  private $listaVentas;

  public function __construct(){
    $this->db = Conectar::conexion();
    $this->listaVentas = array();
  }

  
  public function insertVenta($datos){
    $this->id_empleado = mysqli_real_escape_string($this->db, $datos['id_empleado']);
    $this->fecha_venta = mysqli_real_escape_string($this->db, $datos['fecha_venta']);
    $this->monto_venta = mysqli_real_escape_string($this->db, $datos['monto_venta']);

    $query = $this->db->query("INSERT INTO ventas (id_empleado, fecha_venta, monto_venta) VALUES ('$this->id_empleado', '$this->fecha_venta', '$this->monto_venta')");

    if($query){
      return true;
    }else{
      return false;
    }
  }

}

?>