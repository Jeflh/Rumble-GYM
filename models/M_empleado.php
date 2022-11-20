<?php 

class EmpleadoModel{
  private $db;

  private $id_empleado;
  private $password;
  private $nombre;
  private $cantidad;
  private $apellido_paterno;
  private $apellido_materno;
  private $fecha_nacimiento;
  private $domicilio;
  private $telefono;
  private $tipo;


  private $lista;

  public function __construct(){
    $this->db = Conectar::conexion();
    $this->lista = array();

    $this->id_empleado = 0;
    $this->password = "";
    $this->nombre = "";
    $this->apellido_paterno = "";
    $this->apellido_materno = "";
    $this->fecha_nacimiento = "";
    $this->domicilio = "";
    $this->telefono = "";
    $this->tipo = "";
  }

  public function getAll(){
    $query = $this->db->query("SELECT * FROM empleados ORDER BY id_empleado ASC");

    while($row = $query->fetch_assoc()) {
      $this->lista[] = $row;
    }

    return $this->lista;
  }

  public function getEmpleado($id){
    $query = $this->db->query("SELECT * FROM empleados WHERE id_empleado = '$id'");
    $row = $query->fetch_assoc();

    return $row;
  }

  

  public function insertEmpleado(){ // Función para insertar un producto.
    if(isset($_POST)){ // mysqli_real_escape_string sirve para evitar inyecciones SQL.
      $this->password = mysqli_real_escape_string($this->db, $_POST['password']);
      $this->nombre = mysqli_real_escape_string($this->db, $_POST['nombre']);      
      $this->apellido_paterno = mysqli_real_escape_string($this->db, $_POST['apellido_paterno']);
      $this->apellido_materno = mysqli_real_escape_string($this->db, $_POST['apellido_materno']);
      $this->fecha_nacimiento = mysqli_real_escape_string($this->db, $_POST['fecha_nacimiento']);
      $this->domicilio = mysqli_real_escape_string($this->db, $_POST['domicilio']);
      $this->telefono = mysqli_real_escape_string($this->db, $_POST['telefono']);
      $this->tipo = mysqli_real_escape_string($this->db, $_POST['tipo']);
      

      $error = ""; // Variable para almacenar los errores.

      if(empty($this->nombre) || is_numeric($this->nombre)){
        $error .= "1";
      }
      if(empty($this->apellido_paterno) || is_numeric($this->nombre)){
        $error .= "2";
      }
      if(empty($this->apellido_materno) || is_numeric($this->nombre)){
        $error .= "3";
      }
      if(empty($this->fecha_nacimiento)){
        $error .= "4";
      }
      if(empty($this->domicilio)){
        $error .= "5";
      }
      if(empty($this->telefono) || strlen($this->telefono) != 10){
        $error .= "6";
      }
      if(empty($this->tipo)){
        $error .= "7";
      }
      if(empty($this->password)){
        $error .= "8";
      }
      
      if($error == ""){ // Si no hay errores, se inserta el producto.
        
        $this->id_empleado = generarId();
        $existe = $this->getEmpleado($this->id_empleado);
        while($existe != null){
          $this->id_empleado = generarId();
          $existe = $this->getEmpleado($this->id_empleado);
        }

        $passwordHash = password_hash($this->password, PASSWORD_BCRYPT);

        $query = $this->db->query("INSERT INTO empleados VALUES('$this->id_empleado', '$passwordHash', '$this->nombre', '$this->apellido_paterno', '$this->apellido_materno', '$this->fecha_nacimiento', '$this->domicilio', '$this->telefono', '$this->tipo')");
        
        if($query){
          return true;
        }else{
          return false;
        }
      }else{
        header("Location: index.php?c=empleado&a=nuevo&e=" . $error); 
        // Si hay errores, se redirige a la página de nuevo empleado con los errores.
      }
    }
  }


 
}

?>