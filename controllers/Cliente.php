<?php 

class ClienteController{
  private $auth;

  public function __construct(){
    $this->auth = autenticado();
  }

  public function index(){
    if($this->auth){
      require_once('views/inicio/V_inicioCliente.php');
    }else{
      header('Location: index.php');
    }
  }
}

?>