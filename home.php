<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
      padding: 20px;
    }
    
    .container {
      max-width: 600px;
      margin: 0 auto;
      text-align: center;
    }
    
    .header {
      margin-bottom: 30px;
    }
    
    h1 {
      font-size: 28px;
      font-weight: bold;
      color: #333;
    }
    
    .logo {
      margin-bottom: 20px;
    }
    
    .logo img {
      width: 400px;
      height: auto;
    }
    
    .btn {
      display: inline-block;
      padding: 12px 24px;
      margin: 10px;
      font-size: 18px;
      font-weight: bold;
      text-align: center;
      text-decoration: none;
      text-transform: uppercase;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    
    .btn-primary {
      background-color: #007bff;
      color: #fff;
    }
    
    .btn-primary:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>Base de Datos del Hospital</h1>
    </div>
    <div class="logo">
      <img src="https://i.ibb.co/jkpHkK5/logo-hospital-PHP.png" alt="Hospital Logo">
    </div>
    <a class="btn btn-primary" href="../scripts/select_camas.php">Camas</a>
    <a class="btn btn-primary" href="../scripts/select_paciente.php">Pacientes</a>
    <a class="btn btn-primary" href="../scripts/select_medicos.php">Medicos</a>
    <a class="btn btn-primary" href="index_consulta.php">Consultas</a>
  </div>
</body>
</html>
