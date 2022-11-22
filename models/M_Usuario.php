<?php

class UsuarioModel{
  private $db;

  private $id_usuario;
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

  private $listaUsuarios;

  public function __construct(){
    $this->db = Conectar::conexion();
  }

  public function getUsuarios(){
    $query = $this->db->query("SELECT * FROM usuarios");

    while($row = $query->fetch_assoc()) {
      $this->listaUsuarios[] = $row;
    }

    return $this->listaUsuarios;
  }

}


?>