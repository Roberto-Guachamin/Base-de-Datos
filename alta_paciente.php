<?php
if (isset($_POST['submit'])) {
  $resultado = [
    'error' => false,
    'mensaje' => 'Los datos del paciente ' .$_POST['nombre']. ' ' .$_POST['apellido1']. ' se han ingresado con éxito'
  ];
  $config = include 'config_DB.php';

  try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
 
    //Para convetir la fecha ingresada al formato de la base de datos.
 $fecha = $_POST['fechaIngreso']; 
 $fecha_convertida = date('Y-m-d', strtotime($fecha));

$consultaSQL = "INSERT INTO Pacientes values (null, '";
$consultaSQL .= $_POST['nombre']."','";
$consultaSQL .= $_POST['apellido1']."','";
$consultaSQL .= $_POST['dni']."','";
$consultaSQL .= $fecha_convertida."',";
$consultaSQL .= $_POST['fk_id_cama'].")";

$Paciente = array(
"nombre"   => $_POST['nombre'],  
"apellido1"   => $_POST['apellido1'],
"dni" => $_POST['dni'],
"fechaIngreso" => $fecha_convertida,
"fk_id_cama" => $_POST['fk_id_cama']
);

    $sentencia = $conexion->prepare($consultaSQL);
    $sentencia->execute($Pacientes);

  } catch(PDOException $error) {
    $resultado['error'] = true;
    $resultado['mensaje'] = $error->getMessage();
  }
}
?>

<?php include "../templates/header.php"; ?>

<?php
if (isset($resultado)) {
  ?>
  <div class="container mt-3">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-<?= $resultado['error'] ? 'danger' : 'success' ?>" role="alert">
          <?= $resultado['mensaje'] ?>
        </div>
      </div>
    </div>
  </div>
  <form method="post">
  <button type="submit" name="Volver" class="btn btn-primary">Volver al menú de inicio</button>
  </form>
  <?php
}

?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['Volver'])) {
    header("Location: ../templates/home.php"); 
    exit;
  } 
}
?>
<?php include "../templates/footer.php"; ?>
