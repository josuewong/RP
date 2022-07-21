<?php
include_once("app/Zonaprivada.php");
include_once("app/Medico.php");

if (isset($_GET['logout']))
  {
    $uss->closeSesion();
    header('Location: index.php');
  }
  $con=new Medico();

  $resultado = $con->vermedicos($_SESSION['usertag']);
  $est= $resultado->fetch_assoc();


include_once("Templeat/head.php");
?>
<title>PERFIL</title>
</head>

<body>
  <div>
    <!-- Navegación -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="medicoAgenda.php">Inicio</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="perfilmedico2.php">Editar perfil</a></li>
            <li><a href="index.php?logout">Cerrar sesión</a></li>
          </ul>
        </div>
      </div>
    </nav>



    <div class="container-fluid text-center">
      <div class="container-fluid bg-grey" style="margin-top: 30px;">

        <h2 class="col-sm-12" style="text-align: center;"><strong>Mi Perfil Médico</strong></h2>

        <div class="col-sm-6" style="text-align: left;">
        <h4><strong>Nombre:</strong> <?php echo $est['PNombre']," ",$est['SNombre']," ",$est['PApellido']," ",$est['SApellido'];?></h4>
          <h4><strong>Genero: </strong><?php echo $est['Genero'];?></h4>
          <h4><strong>Fecha de Nacimiento: </strong><?php echo $est['FNacimiento'];?></h4>
          <h4><strong>Dirección: </strong><?php echo $est['Direccion'];?></h4>
          <h4><strong>Teléfono: </strong><?php echo $est['Telefono'];?></h4>
          <h4><strong>Especialidad: </strong><?php echo $est['NombreEspecialidad'];?></h4>
        </div>
      </div>
    </div>
  </div>

<!-- Aquí va el Footer2 -->
<?php include_once("Templeat/footer2.php");?>