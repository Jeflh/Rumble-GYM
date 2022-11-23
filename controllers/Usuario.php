<?php 

class UsuarioController{
  private $auth;
  private $usuarioModel;

  public function __construct(){
    require_once('models/M_usuario.php');
    $this->usuarioModel = new UsuarioModel();
  }

  public function index(){
    $this->auth = autenticado();
    if(!$this->auth){
      header('Location: index.php?c=login');
    }
    if(!$_SESSION['usuario']['tipo']){
      header('Location: index.php?c=panel');
    }
    $usuarios = $this->usuarioModel->getAll();
    require_once('views/usuario/V_inicioUsuarios.php');
  }
}

?>