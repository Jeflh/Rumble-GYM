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

  public function nuevo(){
    require_once('views/usuario/V_nuevoUsuario.php');
  }

  public function insertar(){
    if(isset($_POST)){
      $resultado = $this->usuarioModel->insertUsuario();
      if($resultado){
        header('Location: index.php?c=usuario&e=0');
      }
    }
  }

  public function editar(){
    $id_usuario = $_GET['id'];
    $usuario = $this->usuarioModel->getUsuario($id_usuario);
    require_once('views/usuario/V_editarUsuario.php');
  }  

}

?>