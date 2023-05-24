<?php include "../templates/header.php"; ?>
<?php

    $config = include 'config_DB.php';

    try {
      $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
      
      $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
      $pacientesResultado = $conexion->query("SELECT * FROM Pacientes");
      echo '<a class="btn btn-primary" href="../templates/index_update_paciente.php">Editar</a>
            <a class="btn btn-primary" href="../templates/index_insert_paciente.php">Alta</a>
            <a class="btn btn-primary" href="../templates/index_delete_paciente.php" >Borrar</a>';      
      echo '<table class="table table-striped custom-table display" id="tabla">
                        <thead>
                            <tr>
                                <th scope="col">id del Paciente</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">DNI</th>
                                <th scope="col">Fecha de Inreso</th>
                                <th scope="col">id cama</th>
                            </tr>
                        </thead>
                        <tbody>';
                           while ($row = $pacientesResultado->fetch()) {
                                  echo '<tr scope="row">';
                                  echo '<td>'.$row['id_paciente'].'</td>';
                                  echo '<td>'.$row['nombre'].'</td>';
                                  echo '<td>'.$row['apellido1'].'</td>';
                                  echo '<td>'.$row['dni'].'</td>';
                                  echo '<td>'.$row['fechaIngreso'].'</td>';
                                  echo '<td>'.$row['fk_id_cama'].'</td></tr>';
                           }
                       echo  '</tbody></table>';
    }catch(PDOException $error) {
      echo $error->getMessage();
    }
  
  ?>

  
<form method="post">
  <button type="submit" name="Volver" class="btn btn-primary">Volver al menú de inicio</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['Volver'])) {
    header("Location: ../templates/home.php"); 
    exit;
  } 
}
?>

<?php include "../templates/footer.php"; ?>