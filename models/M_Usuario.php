<?php

class UsuarioModel{
  private $db;

  private $id_usuario;
  private $nombre;
  private $apellido_p;
  private $apellido_m;
  private $sexo;
  private $fecha_nac;
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

  public function getAll(){
    $query = $this->db->query("SELECT * FROM usuarios");

    while($row = $query->fetch_assoc()) {
      $this->listaUsuarios[] = $row;
    }

    return $this->listaUsuarios;
  }

}


?>