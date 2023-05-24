<?php
if (isset($_POST['insertar_consulta'])) {
    $resultado = [
      'error' => false,
      'mensaje' => 'Se ha añadido la consulta con éxito'
    ];
  $config = include 'config_DB.php';

  try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
    if($_POST['paciente']=="OpcionDefecto" || $_POST['medico']=="OpcionDefecto"){
      echo "Debes elegir un DNI de un paciente y datos de un medico para poder dar de alta la consulta";
    }else{
      $Pacientes = array(
        "dni"   => $_POST['paciente']
      );

      $consultaIdPaciente = "SELECT id_paciente FROM Pacientes WHERE dni=:dni LIMIT 1";
      $sentencia = $conexion->prepare($consultaIdPaciente);
      $sentencia->execute($Pacientes);
      $idPaciente = $sentencia->fetch()[0];

      $Medicos = array(
        "dni"   => $_POST['medico']
      );

      $consultaIdMedico = "SELECT id_medico FROM Medicos WHERE dni=:dni";
      $sentencia2 = $conexion->prepare($consultaIdMedico);
      $sentencia2->execute($Medicos);
      $idMedico = $sentencia2->fetch()[0];

      $insert = "INSERT INTO Pacientes_Medicos VALUES(NULL, $idPaciente, $idMedico)";
      $conexion->query($insert);

    }
   
    

  } catch(PDOException $error) {
    echo $error->getMessage();
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