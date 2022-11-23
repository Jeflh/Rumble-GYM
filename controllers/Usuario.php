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

  public function renovar(){
    if(isset($_POST)){
      $resultado = $this->usuarioModel->renovarSuscripcion($_GET['id']);
      if($resultado){
        header('Location: index.php?c=usuario&e=4');
      }
    }
  }

  public function cambiarEstado(){
    $this->usuarioModel->updateEstado($_GET['id'], $_GET['s']);
    header('Location: index.php?c=usuario&e=3');
  }

  public function editar(){
    $id_usuario = $_GET['id'];
    $usuario = $this->usuarioModel->getUsuario($id_usuario);
    require_once('views/usuario/V_editarUsuario.php');
  }  

  public function actualizar(){
    if(isset($_POST)){
      $resultado = $this->usuarioModel->updateUsuario($_POST['id_usuario']);
      if($resultado){
        header('Location: index.php?c=usuario&e=1');
      }
    }
  }

  public function eliminar(){
    $this->usuarioModel->deleteUsuario($_GET['id']);
    header('Location: index.php?c=usuario&e=2');
  }

  public function buscar(){
    if(isset($_POST)){
      $error = '';

      if(empty($_POST['id']) || !is_numeric($_POST['id']) || strlen($_POST['id']) != 5){ 
        $error .= '5';
      }

      if($error == ''){
        $usuario = $this->usuarioModel->getUsuario($_POST['id']);
        if($usuario){
          require_once('views/usuario/V_usuario.php');
        }else{
          header('Location: index.php?c=usuario&e=6');
        }
      } else {
        header('Location: index.php?c=usuario&e='.$error);
      }
    }
  }

  public function ver(){
    if(isset($_GET['id'])){
      $usuario = $this->usuarioModel->getUsuario($_GET['id']);
      require_once('views/usuario/V_usuario.php');
    }
  }
}

?>