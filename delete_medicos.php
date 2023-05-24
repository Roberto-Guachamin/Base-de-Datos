<?php
if (isset($_POST['borrar_medico'])) {
  if($_POST ['id_medico']){
    $resultado = [
      'error' => false,
      'mensaje' => 'Se han borrado exitosamente los datos del médico'
    ];
    $config = include 'config_DB.php';

    try {
      $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
      
      $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
    
      $consultaSQL = "DELETE FROM Medicos WHERE id_medico=".$_POST['id_medico'];
      $conexion->query($consultaSQL);
      
    } catch(PDOException $error) {
      $resultado['error'] = true;
      $resultado['mensaje'] = $error->getMessage();
    }
  }else{
    $resultado = [
      'error' => true,
      'mensaje' => 'El id es obligatorio para poder borrar un médico'
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
