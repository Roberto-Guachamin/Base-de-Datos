<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Borrar los datos de un médico</h2>
      <hr>
      <h3 class="mt-4">Ingresa el id del médico que deseas borrar</h3>
      <form method="post" action="../scripts/delete_medicos.php">
        <div class="form-group">
          <label for="id_medico">Id</label>
          <input type="text" name="id_medico" class="form-control">
        </div>
        
        <div class="form-group">
          <input type="submit" name="borrar_medico" class="btn btn-primary" value="Borrar">
        </div>
      </form>
    </div>
  </div>
</div>
