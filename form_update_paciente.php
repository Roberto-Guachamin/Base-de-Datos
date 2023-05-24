<div class="container">
  <div class="row">
    <div class="col-md-12">
    <h2 class="mt-4">Actualizar datos del Paciente</h2>
      <h3 class="mt-4">Ingresa el id del paciente y sus nuevos datos</h3>
      <hr>
      <form method="post" action="../scripts/update_paciente.php">
        <div class="form-group">
          <label for="id_paciente">Id</label>
          <input type="text" name="id_paciente" class="form-control">
        </div>
        <h4 class="mt-4">Por favor, actualiza sus datos</h4>
        <div class="form-group">
          <label for="nombre">Nombre del Paciente</label>
          <input type="text" name="nombre" id="nombre" class="form-control">
        </div>
        <div class="form-group">
          <label for="apellido1">Apellido del Paciente</label>
          <input type="text" name="apellido1" id="apellido1" class="form-control">
        </div>
        <div class="form-group">
          <label for="dni">DNI del Paciente</label>
          <input type="text" name="dni" id="dni" class="form-control">
        </div>
        <div class="form-group">
          <label for="fechaIngreso">Fecha de Ingreso</label>
          <input type="date" name="fechaIngreso" id="fechaIngreso" class="form-control">
        </div>
        <div class="form-group">
          <label for="fk_id_cama">Número id de la cama</label>
          <input type="text" name="fk_id_cama" id="fk_id_cama" class="form-control">
        </div>
        
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-primary" value="Actualizar">
        </div>
      </form>
      </form>
    </div>
  </div>
</div>
