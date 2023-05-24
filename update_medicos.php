<?php
if (isset($_POST['submit'])) {
  if ($_POST['id_medico']) {
    $resultado = [
      'error' => false,
      'mensaje' => 'Los datos del médico se han actualizado con éxito'
    ];
    $config = include 'config_DB.php';

    try {
      $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
      
      $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

      $consultaSQL = "UPDATE Medicos SET";
      $Medicos = array(
        "id_medico" => $_POST['id_medico']
      );

      if ($_POST["nombre"]) {
        $consultaSQL .= " nombre=:nombre,";
        $Medicos["nombre"] = $_POST['nombre'];
      }
      if ($_POST["apellido1"]) {
        $consultaSQL .= " apellido1=:apellido1,";
        $Medicos["apellido1"] = $_POST['apellido1'];
      }
      if ($_POST["apellido2"]) {
        $consultaSQL .= " apellido2=:apellido2,";
        $Medicos["apellido2"] = $_POST['apellido2'];
      }
      if ($_POST["dni"]) {
        $consultaSQL .= " dni=:dni,";
        $Medicos["dni"] = $_POST['dni'];
      }
      if ($_POST["turno"]) {
        $consultaSQL .= " turno=:turno,";
        $Medicos["turno"] = $_POST['turno'];
      }
      if ($_POST["especialidad"]) {
        $consultaSQL .= " especialidad=:especialidad,";
        $Medicos["especialidad"] = $_POST['especialidad'];
      }
      //la función rtrim recorta desde la derecha a izquierda la com (,) del string
      $consultaSQL = rtrim($consultaSQL, ',');

      $consultaSQL .= " WHERE id_medico=:id_medico";

      $sentencia = $conexion->prepare($consultaSQL);
      $sentencia->execute($Medicos);
    } catch(PDOException $error) {
      $resultado['error'] = true;
      $resultado['mensaje'] = $error->getMessage();
    }
  } else {
    $resultado = [
      'error' => true,
      'mensaje' => 'El id es obligatorio para poder actualizar un médico'
    ];
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
