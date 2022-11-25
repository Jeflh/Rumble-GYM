<?php require_once 'includes/header.php';
      require_once 'includes/navAdmin.php';
?>

<main>
  <div class="container">
    <h1 class="text-light text-center mt-5"><strong>Inicio de sesión</strong></h1>
    <div class="text-center">
      <small class="form-text text-muted">Empleados del gimnasio</small>
    </div>
    <div class="container d-flex justify-content-center">
      <form class="col-3" action="index.php?c=login&a=autenticar" method="POST">
        <fieldset>
          <div class="form-group">
            <label for="codigo" class="form-label mt-5">Código</label>
            <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Introduce tu código" autocomplete="off" size="5" maxlength="5">
          </div>
          <div class="form-group">
            <label for="password" class="form-label mt-3">Contraseña</label>
            <input type="password" min="0" class="form-control" id="password" name="password" placeholder="Introduce tu contraseña" autocomplete="off">
          </div>
          <div class="d-flex justify-content-center mt-4 mb-3">
            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</main>

<?php require_once 'includes/footer.php'; ?>