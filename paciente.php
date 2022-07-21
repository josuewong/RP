<?php
include_once("app/Paciente.php");
include_once("app/Zonaprivada.php");

if (isset($_GET['logout']))
  {
    $uss->closeSesion();
    header('Location: index.php');
  }

  // Busqueda por filtro
  $filter="";
  $cont=new Paciente();
  $resultado=$cont->buscarpaciente("");
  if(isset($_GET['userfilter'])){
  $filter=$_GET['userfilter'];
   $resultado=$cont->buscarpaciente($filter);
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
            <li><a href="medicoAgenda.php#consulta">Consultas</a>
            <li><a href="medicoAgenda.php#mensaje">Receta Médica</a>
            <li ><a href="paciente.php">Buscar Pacientes</a></li>
            <li><a href="index.php?logout">Cerrar sesión</a></li>
          </ul>
        </div>
      </div>
    </nav>

   
    <!-- Aqui va el Titulo y Descripción de la página -->
        <?php
          include_once("Templeat/titulo2.php");
        ?>

    <!-- Busqueda -->

    <form action="paciente.php" method="get" class="container-fluid text-center">
      <div class="container-fluid bg-grey">
        <div>
          <h2>Realizar busquedas de Pacientes existentes</h2>
        </div>
        <div class="col-sm-12" class="container-fluid text-center">
          <h5>Escribe el primer nombre del paciente para realizar una busqueda</h5>
          <input class="form-control" id="userfilter" name="userfilter" placeholder="Ejemplo: Juan" type="text">
        </div>

        <div class="col-sm-12">
          <button id="submit1" name="submit1" class="btn btn-lg"
          style="background-color:rgb(21, 87, 209); color: white; margin-top: 30px;">Realizar una busqueda o Mostrar todos</button>
        </div>
      </div>

     <!-- Lista de Expedientes existentes -->
    <div >
      <h3>Resultados de la busqueda con su expediente de consultas realizadas</h3>
      <div class="container-fluid bg-grey" style="align-content: center; margin-bottom: 15px;">
        <div class="bd-example">
          <table class="table">
            <thead class="table-light">
              <tr>
                <th scope="col">Código</th>
                <th scope="col">Primer Nombre</th>
                <th scope="col">Segundo Nombre</th>
                <th scope="col">Primer Apellido</th>
                <th scope="col">Segundo Apellido</th>
                <th scope="col">Genero</th>
                <th scope="col">Fecha de Nacimiento</th>
                <th scope="col">Derección de Domicilio</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Religión</th>

              </tr>
            </thead>

            <tbody>

            <?php
            $i=false;
            while ($est=$resultado->fetch_assoc()) {
            $i=true;
             ?>
                <tr>
                <th scope="row"><?php echo $est['idPaciente']?></th>
                <td><?php echo $est['PNombre']?></td>
                <td><?php echo $est['SNombre']?></td>
                <td><?php echo $est['PApellido']?></td>
                <td><?php echo $est['SApellido']?></td>
                <td><?php echo $est['Genero']?></td>
                <td><?php echo $est['FNacimiento']?></td>
                <td><?php echo $est['Direccion']?></td>
                <td><?php echo $est['Telefono']?></td>
                <td><?php echo $est['Religion']?></td>
              </tr>
              <?php
              }
              if ($i==false) {
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    </form>

    

    

  </div>


<!-- Aquí va el Footer2 -->
<?php include_once("Templeat/footer2.php");?>
