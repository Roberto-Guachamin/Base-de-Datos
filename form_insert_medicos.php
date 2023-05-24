<?php
echo '<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Ingreso de datos del médico</h2>
      <h3 class="mt-4">Por favor, ingresa la información de un nuevo médico</h3>
      <hr>
      <form method="post" action="../scripts/alta_medicos.php">
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
       
        <label for="paciente">Especialidades</label>
          <select name="especialidad">
          <option value="OpcionDefecto">Elija una especialidad</option>';
          $config = include '../scripts/config_DB.php';

          try {
            $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
            
            $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
            $resultado = $conexion->query("SELECT nombre_especialidad FROM Especialidades");
          
            while ($row = $resultado->fetch()) {
                echo '<option value="'.$row[0].'">'.$row[0].'</option>';
            }
            echo '</select>
          </div>';
          echo '<div class="form-group">
          <input type="submit" name="submit" class="btn btn-primary" value="Enviar">
        </div>
      </form>
    </div>
  </div>
</div>';

} catch(PDOException $error) {
  echo $error->getMessage();
}
?>
