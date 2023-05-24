<?php include "../templates/header.php"; ?>
<?php
    $config = include 'config_DB.php';

    try {
      $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
      
      $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
      $resultado = $conexion->query("SELECT * FROM Medicos");
      
      echo '<br>
      <a class="btn btn-primary" href="../templates/index_update_medicos.php">Editar</a>
            <a class="btn btn-primary" href="../templates/index_insert_medicos.php">Alta</a>
            <a class="btn btn-primary" href="../templates/index_delete_medicos.php">Borrar</a> <br><br>
            <a class="btn btn-primary" href="../templates/home.php">Volver al menú inicio</a><br><br>';
      
      echo '<table class="table table-striped custom-table display" id="tabla">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Primer Apellido</th>
                  <th scope="col">Segundo Apellido</th>
                  <th scope="col">DNI</th>
                  <th scope="col">Turno</th>
                  <th scope="col">Especialidad</th>
                </tr>
              </thead>
              <tbody>';
      
      while ($row = $resultado->fetch()) {
        echo '<tr scope="row">';
        echo '<td>'.$row['id_medico'].'</td>';
        echo '<td>'.$row['nombre'].'</td>';
        echo '<td>'.$row['apellido1'].'</td>';
        echo '<td>'.$row['apellido2'].'</td>';
        echo '<td>'.$row['dni'].'</td>';
        echo '<td>'.$row['turno'].'</td>';
        echo '<td>'.$row['especialidad'].'</td></tr>';
      }
      
      echo '</tbody></table>';
      
    } catch(PDOException $error) {
      echo $error->getMessage();
    }
?>


<?php include "../templates/footer.php"; ?>