<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Crea una cama</h2>
      <hr>
      <form method="post" action="../scripts/alta_cama.php">
        <div class="form-group">
          <label for="zona">Zona</label>
          <input type="text" name="zona" class="form-control">
        </div>
        <div class="form-group">
          <label for="planta">Planta</label>
          <input type="text" name="planta" class="form-control">
        </div>
        <div class="form-group">
          <label for="fecha">Fecha Cambio Sábanas</label>
          <input type="text" name="fecha" class="form-control">
        </div>
        <div class="form-group">
          <input type="submit" name="insertar_cama" class="btn btn-primary" value="Insertar Cama">
        </div>
      </form>
    </div>
  </div>
</div>
