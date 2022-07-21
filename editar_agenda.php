<?php
include_once("app/Zonaprivada.php");
include_once("app/Consulta.php");
$p=new Consulta();
if (isset($_POST['editar'])) {

$idConsulta=$_POST['editar'];

if (isset($_POST['cancelarcon'])) {
  header("location: sesionpaciente.php#Historial");
}

if (isset($_POST['actualizar'])) {
    header("location: perfilpaciente1.php");
  }
/*
if (isset($_POST['actualizar'])) {
    $clasif=$_POST['clasificacion'];
    $descr=$_POST['descripcion'];
    $fecha=$_POST['fecha'];
    $hora=$_POST['hora'];
    $idpasiente=$_SESSION['usertag'];

  //  if ( $p->actualizarconsulta($idConsulta,$clasif,$descr,$fecha,$hora,$idpasiente,1)) {
        header("location:perfilpaciente1.php");
   //    }
}//else  header("location:perfilpaciente1");
*/

}else header("location: sesionpaciente.php#Historial");


include_once("Templeat/head.php");

?>


<title>Editar Cosulta</title>
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
          <a class="navbar-brand" href="sesionpaciente.php">Inicio</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
          <li><a href="perfilpaciente1.php">Perfil</a></li>
          <li><a href="sesionpaciente#Agendar">Consulta Médica</a></li>
          <li><a href="sesionpaciente#Historial">Historial</a></li>
          <li><a href="sesionpaciente#Acercade">Acerca de</a></li>
          <li><a href="index.php?logout">Cerrar sesión</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">

     <!-- actualizar Agendar value="-->
   
     <form action="editar_agenda.php" method="POST" class="container-fluid bg-grey" class="container-fluid text-center">

      <h2 class="text-center">Actualizar Consulta <?php echo $_POST['editar'], $_SESSION['usertag']?></h2>

      <div class="row">
        <div class="col-sm-4">
          <p>Contactos de emergencias las 24 horas.</p>
          <p><span class="glyphicon glyphicon-map-marker"></span> Consultorio.Managua, Nic</p>
          <p><span class="glyphicon glyphicon-phone"></span> +505 8888 8888</p>
          <p><span class="glyphicon glyphicon-envelope"></span> consultoriodefe@gmail.com</p>
        </div>

        <div class="col-sm-8">
          <div class="row">

            

            <div class="text-center">
            <div class="col-sm-12 form-group">
            
              <div class="col-sm-12 form-group">
              <h5>Clasifica para quien es la consulta</h5>
              <select class="form-control" id="clasificacion" name="clasificacion" class="from-select" arial label="Defaul select example">
                <option selected>"seleciona"</option>
                <option value="Adulto">Adulto</option>
                <option value="Adolecente">Adolecente</option>
                <option value="Niño">Niño</option>
              </select>
            </div>

            <div class="col-sm-6 form-group" style="left: 0px; right: 50px;">
              <h5>Establece una fecha para la consulta</h5>
              <input class="form-control" id="fecha" name="fecha" placeholder="Fecha de la cita" type="date"
               >
            </div>

            <div class="col-sm-6 form-group">
              <h5>Establece una hora para la consulta</h5>
              <input class="form-control" id="hora" name="hora" placeholder="Hora" type="time">
            </div>

            <div class="col-sm-12 form-group">
              <h5>Describe el estado en el que te enceuntras, sintomas que has tenido, entre otros detalles para poder
                evaluarte.</h5>
              <textarea id="descripcion" name="descripcion" class="form-control" placeholder="Descripción de la consulta:"
                rows="5"></textarea><br>
            </div>
            <button name="actualizar" style="background-size: 30%;" class="btn btn-default pull-right" type="submit">Actualizar</button>
            <button  name="cancelarcon" style="background-size: 30%;" class="btn btn-default pull-right" type="submit">Cancelar</button>
              </div>

            </div>
          </div>
        </div>
      </div>

    </form>

  </div>
    <!-- Aquí va el Footer2 -->
<?php include_once("Templeat/footer2.php");?>