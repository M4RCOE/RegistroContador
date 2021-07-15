<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contador</title>

  <!--  Importación de bootstrap  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  <!--  Importación de estilos propios  -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/estilos.css'); ?>">
  <!--  Importación de jquery  -->
  <script src="<?php echo base_url('js/jquery-3.6.0.min.js'); ?>"></script>
  <!--  Importación de chartjs  -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!--  Declaración de variables para intervalo de contadores y fecha glables  -->
  <script>
    var intervalo = {};
    var f; 
  </script>
</head>

<body class="d-flex flex-column min-vh-100">
  <!--  Navbar  -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid ">
      <a class="navbar-brand" href="#">Contador</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
          </li>
        </ul>
        <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php 
                $user = $this->session->userdata('user'); 
                echo $user['username'];
              ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="<?php echo site_url('User_controller/logout') ?>">Cerrar Sesión</a>
              </li>
            </ul>
          </li>     
        </ul>
      </div>
    </div>
  </nav>