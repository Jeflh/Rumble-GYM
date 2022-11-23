<?php

  class BitacoraController{
    private $auth;
    private $asistenciaModel;
    private $usuarioModel;

    public function __construct(){
      require_once('models/M_asistencia.php');
      require_once('models/M_usuario.php');
      $this->asistenciaModel = new AsistenciaModel();
      $this->usuarioModel = new UsuarioModel();
    }

    public function index(){
      $this->auth = autenticado();
      if(!$this->auth){
        header('Location: index.php?c=login');
      }
      if($_SESSION['usuario']['tipo'] != '1'){
        header('Location: index.php?c=panel');
      }
      $usuarios = $this->usuarioModel->getAll();
      $fechaActual = date('Y-m-d');
      $fechaCorte = date('Y-m-d', strtotime($fechaActual . ' - 1 month'));
      foreach($usuarios as $usuario){//por cada uno de estos hacer un foreach
        $asistencias = $this->asistenciaModel->getAsistencias($usuario['id_usuario'], $fechaCorte, $fechaActual );
        // $listaAsistencia  = array(
        //   'asistencias' => $asistencias
        // );
        // $asistencias = null;
      }
      echo '<pre>';
      var_dump($asistencias);
      echo '</pre>';
      exit;

      
      require_once('views/bitacora/V_inicioBitacora.php');
    }

    public function porcentajeAsistencia(){
      
    }




  }


?>