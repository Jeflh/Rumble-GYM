<?php 

class AsistenciaController{
  private $auth;
  private $listaInterna;

  public function __construct(){
    $this->auth = autenticado();
    if(!$this->auth){
      header('Location: index.php');
    }
    require_once('models/M_asistencia.php');
    require_once('models/M_cliente.php');

    $clientes = new ClienteModel();
    $this->listaInterna = $clientes->getClientes();
  }
  
  public function guardar(){
    if(isset($_POST)){
      $asistencia = new AsistenciaModel();
      $existe = $asistencia->existeDia($_POST['fecha']);

      if(!$existe){
        for($i = 0; $i < count($this->listaInterna); $i++){
          $asistenciaInicial [$i] = array(
            'id_cliente' => $this->listaInterna[$i]['id_cliente'],
            'fecha_asistencia' => $_POST['fecha'],
            'estado' => 0
          );
          $asistencia->setDia($asistenciaInicial[$i]);
        }
        $this->guardar();
      } else {
        $asistenciaActual = array(
          'id_cliente' => $_POST['id'],
          'fecha_asistencia' => $_POST['fecha'],
          'estado' => 1
        );
        $asistencia->updateDia($asistenciaActual);
      }

      header('Location: index.php?c=login&a=cerrar&e=0');
    }
  }
}

?>