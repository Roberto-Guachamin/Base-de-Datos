


<?php
echo '<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Crea una consulta</h2>
      <hr>
      <form method="post" action="../scripts/alta_consulta.php">

        <div class="form-group">
          <label for="paciente">DNI Paciente</label>
          <select name="paciente">
          <option value="OpcionDefecto">Elija un DNI</option>';
          $config = include '../scripts/config_DB.php';

try {
  $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
  
  $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
  $dnisPacientesResultado = $conexion->query("SELECT DISTINCT dni FROM Pacientes");

  while ($row = $dnisPacientesResultado->fetch()) {
      echo '<option value="'.$row[0].'">'.$row[0].'</option>';
  }
echo '</select>
</div>';

echo '<div class="form-group">
<label for="medico">Datos Medico: </label>
<select name="medico">
<option value="OpcionDefecto">Elija los datos de un medico</option>';
$medicosResultado = $conexion->query("SELECT dni,especialidad, nombre, apellido1, apellido2  FROM Medicos");

while ($row = $medicosResultado->fetch()) {
    echo '<option value="'.$row[0].'">('.$row[1].') - '.$row[2].' '.$row[3].' '.$row[4].'</option>';
}

echo '</select>
          </div>';
          echo '<div class="form-group">
          <input type="submit" name="insertar_consulta" class="btn btn-primary" value="Insertar Consulta">
        </div>
        </form>
    </div>
  </div>
</div>';

          }catch(PDOException $error) {
            echo $error->getMessage();
          }


?>
<?php
$conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
$resultado = $conexion->query("SELECT * FROM Pacientes_Medicos");
?>

<table class="table table-striped custom-table table-sm display" id="tabla">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">id del Paciente</th>
      <th scope="col">id del Médico</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($row = $resultado->fetch()) {
      echo '<tr scope="row">';
      echo '<td>'.$row['id_paciente_medico'].'</td>';
      echo '<td>'.$row['fk_id_paciente'].'</td>';
      echo '<td>'.$row['fk_id_medico'].'</td></tr>';
    }
    ?>
  </tbody>
</table>

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


