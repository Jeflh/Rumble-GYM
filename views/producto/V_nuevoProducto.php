<?php require_once 'includes/header.php';
require_once 'includes/navLogueado.php';
?>

<main>

  <div class="container">
    <h1 class="text-light text-center mt-2"><strong>Nuevo producto</strong></h1>

    <div class="d-flex justify-content-between ">
      <a href="index.php?" class="btn btn-info">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
        </svg>
      </a>
    </div>

    <div class="container d-flex justify-content-center">
      <form class="col-4">
        <fieldset>
          <div class="form-group">
            <label for="nombre" class="form-label mt-4">Nombre</label>
            <input type="text" class="form-control" id="nombre" placeholder="Nombre del producto" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="cantidad" class="form-label mt-4">Cantidad</label>
            <input type="number" min="0" class="form-control" id="cantidad" placeholder="Cantidad de productos" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="precio" class="form-label mt-4">Precio</label>
            <input type="number" min="0" class="form-control" id="precio" placeholder="Precio del producto" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="descripcion" class="form-label mt-4">Decripcion</label>
            <textarea class="form-control" id="descripcion" rows="3" data-dl-input-translation="true" placeholder="Descripcion del producto" autocomplete="off"></textarea>
            <deepl-inline-translate style="z-index: 1999999999;"></deepl-inline-translate>
          </div>

          <div class="d-flex justify-content-center mt-3 mb-3">
            <button type="submit" class="btn btn-primary mt-2">Registrar</button>
          </div>
        </fieldset>
      </form>
    </div>

  </div>

</main>

<?php require_once 'includes/footer.php' ?>