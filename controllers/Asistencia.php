<?php 

class AsistenciaController{
  private $auth;

  public function __construct(){
    $this->auth = autenticado();
    if(!$this->auth){
      header('Location: index.php');
    }
    require_once('models/M_asistencia.php');
  }
  
  public function nueva(){
    echo "Nueva asistencia";
  }
}

?>