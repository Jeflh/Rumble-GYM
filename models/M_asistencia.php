<?php

class AsistenciaModel{
  private $db;
  private $listaAsistencia; 

  public function __construct(){
    $this->db = Conectar::conexion();
    $this->listaAsistencia = array();
  }

  public function setDia($cliente){
    $id_cliente = $cliente['id_cliente'];
    $fecha_asistencia = $cliente['fecha_asistencia'];
    $estado = $cliente['estado'];
    
    $query = $this->db->query("INSERT INTO asistencias (id_cliente, fecha_asistencia, estado)  VALUES('$id_cliente', '$fecha_asistencia', '$estado')");
  }

  public function updateDia($cliente){
    $id_cliente = $cliente['id_cliente'];
    $fecha_asistencia = $cliente['fecha_asistencia'];
    $estado = $cliente['estado'];

    $query = $this->db->query("UPDATE asistencias SET estado = '$estado' WHERE fecha_asistencia = '$fecha_asistencia' AND id_cliente = '$id_cliente'");
  }

  public function existeDia($fecha){
    $query = $this->db->query("SELECT * FROM asistencias WHERE fecha_asistencia = '$fecha'");

    if($query->num_rows > 0){
      return true;
    } else {
      return false;
    }
  }

  public function getAsistencias($id, $inicio, $fin){
    $query = $this->db->query("SELECT * FROM asistencias WHERE id_cliente = '$id' AND fecha_asistencia BETWEEN '$inicio' AND '$fin'");

    while($row = $query->fetch_assoc()) {
      $this->listaAsistencia[] = $row;
    }

    return $this->listaAsistencia;
  }

}

?>