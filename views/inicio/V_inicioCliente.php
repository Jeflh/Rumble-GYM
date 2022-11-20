<?php
require_once 'includes/header.php';
require_once 'includes/navLogueado.php';
?>

<main>
  <div class="container">
    <h1 class="text-light text-center mt-2"><strong>Usuario</strong></h1>

    <div class="d-flex justify-content-center">
      <a class="btn btn-info" href="index.php?c=asistencia&a=nueva">Confirmar asistencia</a>
    </div>

    <div class="d-flex justify-content-center text-center">
      <div class="col-3 card bg-dark text-light mt-3 me-3">
        <div class="card-header">
          <h3 class="card-title">Somatometría</h3>
        </div>
        <div class="card-body">
          <p class="card-text"><strong>Peso: </strong><?php echo $cliente['peso'] . 'kg'; ?></p>
          <p class="card-text"><strong>Estatura: </strong><?php echo $cliente['altura'] . 'mts'; ?></p>
          <p class="card-text"><strong>IMC: </strong><?php echo $cliente['imc']; ?></p>
        </div>
      </div>

      <div class="col-3 card bg-dark text-light mt-3">
        <div class="card-header">
          <h3 class="card-title text-center">Suscripción
            <?php $status = fechaEnRango($cliente['fecha_inicio'], $cliente['fecha_fin']);
            if ($status == true) {
              echo '<span class="text-success"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/></svg></span>';
            } else {
              echo '<span class="text-warning"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/></svg></span>';
            }
            ?>
          </h3>
        </div>
        <div class="card-body text-center">
          <h5 class="card-text text-center text-primary">
            <?php
            if ($cliente['tipo_suscripcion'] == '1') {
              echo '<strong>Mensual</strong>';
            } else if ($cliente['tipo_suscripcion'] == '2') {
              echo '<strong>Trimestral</strong>Trimestral';
            } else if ($cliente['tipo_suscripcion'] == '3') {
              echo '<strong>Semestral</strong>Semestral';
            } else if ($cliente['tipo_suscripcion'] == '4') {
              echo '<strong>Anual</strong>Anual';
            }
            ?>
          </h5>
          <p class="card-text"><strong>Inicio: </strong><?php echo date("d-m-Y", strtotime($cliente['fecha_inicio'])); ?></p>
          <p class="card-text"><strong>Fin: </strong><?php echo date("d-m-Y", strtotime($cliente['fecha_fin'])); ?></p>
        </div>
      </div>
    </div>

    <div class="d-flex justify-content-center">
      <div class="col-4 card bg-dark text-light mt-3 mb-3 ">
        <div class="card-header">
          <h3 class="card-title text-center">Datos personales</h3>
        </div>
        <div class="card-body">
          <p class="card-text"><strong>Estado: </strong><?php echo $estado = ($cliente['estado'] == '1') ? 'Activo ' : 'Inactivo '; ?>
            <?php
            if ($cliente['estado'] == '1') {
              echo '<span class="text-success"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/></svg></span>';
            } else if ($cliente['estado'] == '0') {
              echo '<span class="text-warning"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
              </svg></span>';
            }
            ?></p>
          <p class="card-text"><strong>Código: </strong><?php echo $cliente['id_cliente']; ?></p>
          <p class="card-text"><strong>Nombre: </strong><?php echo $cliente['nombre'] . ' ' . $cliente['apellido_paterno'] . ' ' . $cliente['apellido_materno']; ?></p>
          <p class="card-text"><strong>Sexo: </strong><?php echo $sexo = ($cliente['sexo'] == 'M') ? 'Masculino' : 'Femenino' ?></p>
          <p class="card-text"><strong>Fecha de nacimiento: </strong><?php echo date("d-m-Y", strtotime($cliente['fecha_nacimiento'])); ?></p>
          <p class="card-text"><strong>Domicilio: </strong><?php echo $cliente['domicilio']; ?></p>
          <p class="card-text"><strong>Teléfono: </strong><?php echo $cliente['telefono']; ?></p>
        </div>
      </div>
    </div>
  </div>
</main>

<?php require_once 'includes/footer.php' ?>