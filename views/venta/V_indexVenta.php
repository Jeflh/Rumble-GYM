<?php
require_once('includes/header.php');
require_once('includes/navLogueado.php');
?>

<main>
    <div class="container">
        <h1 class="text-light text-center mt-2"><strong>Punto de venta</strong></h1>

    <div class="d-flex justify-content-between mb-3">
      <a href="index.php" class="btn btn-info">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/></svg>
      </a>
      <a href="index.php?c=producto&a=nuevo" class="btn btn-info">Agregar producto</a>
    </div>
    </div>
</main>

<?php
require_once('includes/footer.php');
?>