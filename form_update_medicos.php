<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Actualizar datos de un médico</h2>
      <h3 class="mt-4">Por favor, ingresa primero el id y luego los nuevos datos</h3>
      <hr>
      <form method="post" action="../scripts/update_medicos.php">
      <div class="form-group">
          <label for="id_medico">Id</label>
          <input type="text" name="id_medico" class="form-control">
        </div>
        <h4 class="mt-4">Por favor, actualiza sus datos</h4>
        <p style="font-size: 0.9em; color: #888;">Puedes actualizar cualquiera de los campos, ya sea algunos o todos</p>
        <br>
        <div class="form-group">
          <label for="nombre">Nombre del Médico</label>
          <input type="text" name="nombre" id="nombre" class="form-control"> 
        </div>
        <div class="form-group">
          <label for="apellido1">Primer Apellido</label>
          <input type="text" name="apellido1" id="apellido1" class="form-control">
        </div>
        <div class="form-group">
          <label for="apellido2">Segundo Apellido</label>
          <input type="text" name="apellido2" id="apellido2" class="form-control">
        </div>
        <div class="form-group">
          <label for="dni">DNI del Médico</label>
          <input type="text" name="dni" id="dni" class="form-control">
        </div>
        <div class="form-group">
          <label for="turno">Turno:</label>
          <input type="text" name="turno" id="turno" class="form-control">
        </div>
        <div class="form-group">
          <label for="especialidad">Especialidad</label>
          <input type="text" name="especialidad" id="especialidad" class="form-control">
        </div>
        
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-primary" value="Actualizar">
        </div>
      </form>
    
    </div>
  </div>
</div>