<?php 

class VentaController{
  private $auth;
  private $ventaModel;
  private $productoModel;

  public function __construct(){
    require_once('models/M_venta.php');
    require_once('models/M_producto.php');
    $this->ventaModel = new VentaModel();
    $this->productoModel = new ProductoModel();
  }

  public function index(){
    $this->auth = autenticado();
    if(!$this->auth){
      header('Location: index.php?c=login');
    }
    if(!$_SESSION['usuario']['tipo']){
      header('Location: index.php?c=panel');
    }
    $empleado = $_SESSION['usuario'];
    $productos = $this->productoModel->getAll();
    require_once('views/venta/V_inicioVenta.php');
  }
}

?>