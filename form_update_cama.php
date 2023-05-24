<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Actualiza una cama</h2>
      <hr>
      <form method="post" action="../scripts/update_cama.php">
        <div class="form-group">
          <label for="id_cama">Id</label>
          <input type="text" name="id_cama" class="form-control">
        </div>
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
          <input type="submit" name="actualizar_cama" class="btn btn-primary" value="Actualizar Cama">
        </div>
      </form>
    </div>
  </div>
</div>
