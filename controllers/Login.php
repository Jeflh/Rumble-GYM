<?php

class LoginController{

  public function __construct(){
    require_once('models/M_login.php');
  }

  public function index(){    
    require_once('views/login/V_loginClientes.php');
  }

  public function empleados(){
    require_once('views/login/V_loginEmpleados.php');
  }

  public function autenticarCliente(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $codigo = $_POST['codigo'];
      $fecha_nac = $_POST['fecha_nac'];

      $error = "";

      if(empty($codigo)){
        $error .= "1";
      }
      if(empty($fecha_nac)){
        $error .= "2";
      }

      if($error == ""){
        $login = new LoginModel();
        $cliente = $login->autenticarCliente($codigo, $fecha_nac);

        if($cliente){ // Si la consulta devuelve un resultado (el usuario existe)
          session_start();
          $_SESSION['usuario'] = $cliente; // Guardar datos del usuario en la sesión
          $_SESSION['login'] = true;

          require_once('views/inicio/V_inicioCliente.php');
        }
        else{
          header("Location: index.php?&e=3"); // Código o fecha de nacimiento incorrectos
        }
      }else{
        header("Location: index.php?&e=$error");
      }
    }
  }

  public function cerrar(){  // Función para cerrar sesión
    session_start();

    $_SESSION = [];

    header('Location: index.php');
  }
}

?>