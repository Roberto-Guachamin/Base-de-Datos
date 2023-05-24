<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Borrar una cama</h2>
      <hr>
      <form method="post" action="../scripts/delete_paciente.php">
        <div class="form-group">
          <label for="id_paciente">Id</label>
          <input type="text" name="id_paciente" class="form-control">
        </div>
        
        <div class="form-group">
          <input type="submit" name="borrar_paciente" class="btn btn-primary" value="Borrar Paciente">
        </div>
      </form>
    </div>
  </div>
</div>
