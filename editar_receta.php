<?php
include_once("app/Zonaprivada.php");
require_once("app/Receta.php");



if (isset($_POST['submit'])) {
    
$idreceta=$_POST['editarreceta'];
$Medico_idMedico=$_SESSION['usertag'];
$Tratamiento=$_POST['tratamiento'];
$Costo=$_POST['costo'];
$s=new Receta();
$res=$s->ActualizarReceta($idreceta,$Tratamiento,$Costo,$Medico_idMedico);
  header("location: medicoAgenda.php#Receta");
}

if (isset($_POST['cancelar'])) {
    header("location: medicoAgenda.php#Receta");
}


include_once("Templeat/head.php");
?>


<title>CONSULTORIO MÉDICO</title>
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
            <li><a href="perfilmedico1.php">Perfil</a>
            <li><a href="medicoAgenda.php">Consultas</a>
            <li><a href="medicoAgenda.php#mensaje">Receta Médica</a>
            <li><a href="paciente.php">Buscar Pacientes</a></li>
            <li><a href="index.php?logout">Cerrar sesión</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">

      <!-- Responder Consultas -->
      <form action="editar_receta.php" method="POST" class="container-fluid text-center">
        <div class="col-sm-12;">
          <div class="container-fluid bg-grey">
            <h2 class="text-center">Editar Receta Médica</h2>
            <h5 style="text-align: left;">Escribe el código del paciente para enviar un mensaje</h5>
            <div>
              <input class="form-control" id="cod" name="cod" value="<?php echo $_POST['editarreceta'];?>" type="number"
                >
            </div>

            <div class="col-sm-6 form-group" style="margin-top: 15px;">
              <h5 style="text-align: left;">Escribe el tratamiento ha seguir por el paciente:</h5>
              <input id="tratamiento" name="tratamiento" class="form-control" placeholder="Escribe el tratamiento para el paciente"
                type="text" style="height: 150px; ">
            </div>

            <div class="col-sm-6 form-group" style="margin-top: 15px;">
              <h5 style="text-align: left;">Escribe el costo de la consulta y tratamiento en Total C$:</h5>
              <input id="costo" name="costo" class="form-control" placeholder="Costo Total: C$" type="number">
            </div>

            <div class="text-center">
              <div class="col-sm-6 form-group">
                <button id="submit" name="submit" style="background-size: 30%;" class="btn btn-default pull-right" type="submit">Actualizar</button>
                <form action="editar_receta.php" method="POST">
                <button id="cancelar" name="cancelar" style="background-size: 30%;" class="btn btn-default pull-right" type="submit">Cancelar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </form>

    </div>



<!-- Llamada al Footer1 -->
<?php
  include_once("Templeat/footer2.php");
?>
