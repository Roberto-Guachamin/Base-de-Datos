<?php
if (isset($_POST['insertar_cama'])) {
  $resultado = [
    'error' => false,
    'mensaje' => 'Se ha añadido la cama con éxito'
  ];
  $config = include 'config_DB.php';

  try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    //echo $dsn;
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
 
    //Para convetir la fecha ingresada al formato de la base de datos.
    $fecha = $_POST['fechaIngreso']; 
    $fecha_convertida = date('Y-m-d', strtotime($fecha));

    $cama = array(
      "zona"   => $_POST['zona'],
      "planta" => $_POST['planta'],
      "fechaCambioSabanas" => $fecha_convertida
    );
//INSERT INTO Camas(planta, fechaCambioSabanas) VALUES("25", "2023/01/29");
    $consultaSQL = "INSERT INTO Camas (zona, planta, fechaCambioSabanas) ";
    $consultaSQL .= "values (:" . implode(", :", array_keys($cama)) . ")";

    $sentencia = $conexion->prepare($consultaSQL);
    $sentencia->execute($cama);

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
