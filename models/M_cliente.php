<?php

class ClienteModel{
  private $db;

  private $id_cliente;
  private $nombre;
  private $apellido_paterno;
  private $apellido_materno;
  private $sexo;
  private $fecha_nacimiento;
  private $peso;
  private $altura;
  private $domicilio;
  private $telefono;
  private $estado;
  private $tipo_suscripcion;
  private $fecha_inicio;
  private $fecha_fin;

  private $listaClientes;

  public function __construct(){
    $this->db = Conectar::conexion();
  }

  public function getClientes(){
    $query = $this->db->query("SELECT * FROM clientes");

    while($row = $query->fetch_assoc()) {
      $this->listaClientes[] = $row;
    }

    return $this->listaClientes;
  }

}


?>