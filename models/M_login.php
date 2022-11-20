<?php 

class LoginModel{

  private $db;

  public function __construct(){
    $this->db = Conectar::conexion();
  }

  public function autenticarCliente($codigo, $fecha_nac){
    $query = $this->db->query("SELECT * FROM clientes WHERE id_cliente = '$codigo' AND fecha_nacimiento = '$fecha_nac'");

    $row = $query->fetch_assoc();

    return $row;
  }

}

?>