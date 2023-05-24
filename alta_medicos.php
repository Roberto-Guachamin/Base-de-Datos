<?php

if (isset($_POST['submit'])) {
  $resultado = [
    'error' => false,
    'mensaje' => 'Los datos del médico ' .$_POST['nombre']. ' ' .$_POST['apellido1']. ' se han ingresado con éxito'
  ];
  $config = include 'config_DB.php';

  try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    $Medicos = array(
        "nombre"   => $_POST['nombre'],
        "apellido1" => $_POST['apellido1'],
        "apellido2"   => $_POST['apellido2'],
        "dni" => $_POST['dni'],
        "turno"   => $_POST['turno'],
        "especialidad" => $_POST['especialidad'],
      );

    $consultaSQL = "INSERT INTO Medicos (nombre, apellido1, apellido2, dni, turno, especialidad)";
    $consultaSQL .= "values (:" . implode(", :", array_keys($Medicos)) . ")";


   $sentencia = $conexion->prepare($consultaSQL);
   $sentencia->execute($Medicos);

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