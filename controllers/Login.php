<?php

class LoginController{

  public function index(){
    require_once('views/login/V_loginClientes.php');
  }

  public function empleados(){
    require_once('views/login/V_loginEmpleados.php');
  }
}

?>