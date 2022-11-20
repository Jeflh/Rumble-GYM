<?php

class EmpleadoController{

  private $empleadoModel;

  public function __construct(){
    require_once('models/M_Empleado.php');
    $this->empleadoModel = new EmpleadoModel();
  }

  public function index(){
    require_once('views/empleado/V_panelEmpleados.php');
  }

  public function nuevo(){
    require_once('views/empleado/V_nuevoEmpleado.php');
  }
  
  public function insertar(){
    if(isset($_POST)){
      $resultado = $this->empleadoModel->insertEmpleado();
      if($resultado){
        header('Location: index.php?c=empleado&e=0');
      }
      else{
        echo "Error al insertar";
      }
    }
  }
}

?>