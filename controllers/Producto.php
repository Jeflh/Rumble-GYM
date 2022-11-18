<?php 

class ProductoController{

  private $productoModel;

  public function __construct(){
    require_once 'models/M_producto.php';
    $this->productoModel = new ProductoModel();
  }

  public function index(){
    $productos = $this->productoModel->getAll();
    require_once('views/producto/V_panelProductos.php');
  }

  public function nuevo(){
    require_once 'views/producto/V_nuevoProducto.php';
  }

  public function insertar(){
    if(isset($_POST)){
      $this->productoModel->insertProducto();
      header('Location: index.php?c=producto');
    }
  }

  public function ver(){
    $producto = $this->productoModel->getProducto($_GET['id']);
    require_once 'views/producto/V_producto.php';
  }

  public function editar(){
    $producto = $this->productoModel->getProducto($_GET['id']);
    require_once 'views/producto/V_editarProducto.php';
  }

  public function actualizar(){
    if(isset($_POST)){
      $this->productoModel->updateProducto($_GET['id']);
      header('Location: index.php?c=producto&a=ver&id=' . $_GET['id']);
    }
  }

  public function eliminar(){
    $this->productoModel->deleteProducto($_GET['id']);
    header('Location: index.php?c=producto');
  }
}

?>