<?php 

class ProductoController{

  private $productoModel;

  public function __construct(){
    require_once 'models/M_producto.php';
    $this->productoModel = new ProductoModel();
  }

  public function index(){ // Función para mostrar todos los productos.
    $productos = $this->productoModel->getAll();
    require_once('views/producto/V_panelProductos.php');
  }

  public function nuevo(){ // Función para mostrar el formulario de nuevo producto.
    require_once 'views/producto/V_nuevoProducto.php';
  }

  public function insertar(){ // Función para insertar un producto.
    if(isset($_POST)){
      $resultado = $this->productoModel->insertProducto();
      if($resultado){
        header('Location: index.php?c=producto&e=0');
      }
    }
  }

  public function editar(){ // Función para mostrar el formulario de editar producto.
    $producto = $this->productoModel->getProducto($_GET['id']);
    require_once 'views/producto/V_editarProducto.php';
  }

  public function actualizar(){ // Función para actualizar un producto.
    if(isset($_POST)){
      $resultado = $this->productoModel->updateProducto($_POST['id_producto']);
      if($resultado){
        header('Location: index.php?c=producto&e=1');
      }
    }
  }

  public function eliminar(){ // Función para eliminar un producto.
    $this->productoModel->deleteProducto($_GET['id']);
    header('Location: index.php?c=producto&e=2');
  }
}

?>