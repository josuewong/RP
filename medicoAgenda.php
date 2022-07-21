<?php
include_once("app/Zonaprivada.php");
include_once("app/Consulta.php");
include_once("app/Receta.php");
include_once("app/Paciente.php");

if (isset($_GET['logout']))
  {
    $uss->closeSesion();
    header('Location: index.php');
  }


  $p=new Consulta();
  $a=new Receta();
  $res=$p->TodaslasConsultas();

  if (isset($_POST['submit'])) {

    $tratamiento=$_POST['tratamiento'];
    $costo=$_POST['costo'];
    $codigo=$_POST['cod'];
    $idmedico=$_SESSION['usertag'];
    $consul=1;
      $a->enviarreceta($tratamiento,$costo,$idmedico,$consul,$codigo);
      header("location: medicoAgenda.php#mensaje");
     }
     
     if (isset($_POST['editarreceta'])) {
      header("location: editar_receta.php");
     }

     if (isset($_POST['elimnarRes'])) {
        $result=$a->eliminarReceta($_POST['elimnarRes']);
        header("location: medicoAgenda.php#Receta");
      }

     if (isset($_POST['elimnarconn'])) {
        $result=$p->eliminarcons($_POST['elimnarconn']);
        header("location: medicoAgenda.php#consulta");
      }

    $re=$a->allRecetas();

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
            <li><a href="#consulta">Consultas</a>
            <li><a href="#mensaje">Receta Médica</a>
            <li><a href="paciente.php">Buscar Pacientes</a></li>
            <li><a href="index.php?logout">Cerrar sesión</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <!-- Aqui va el Titulo y Descripción de la página -->
          <?php
            include_once("Templeat/titulo2.php");
          ?>
    <!-- Lista de consultas -->

    <div id="consulta" class="container-fluid text-center">
      <div class="container-fluid bg-grey" style="align-content: center;">
        <div>
          <h2 style="text-align: center;">Consultas Agendadas para Atender Proximamente</h2>
        </div>

        <div class="container-fluid bg-grey">
          <div class="table-responsive">
            <table class="table align-middle">
              <thead>
                <tr>
                <th scope="col" class="w-25">#</th>
                  <th scope="col" class="w-25">Agendo Consulta</th>
                  <th scope="col" class="w-25">Clasificación de la cosulta</th>
                  <th scope="col" class="w-25">Fecha y Hora</th>
                  <th scope="col" class="w-25">Descripción de la Consulta</th>
                  <th scope="col" class="w-25" style="text-align: center;">Opciones</th>
                </tr>
              </thead>
              <tbody style="text-align: left;">
              <?php
              while ($estaf=$res->fetch_assoc()) {
             ?>
                <tr>
                  <td><strong><?php echo $estaf['idConsulta'];?></strong></td>
                  <td><strong><?php echo $estaf['nombre'];?></strong></td>
                  <td><?php echo $estaf['ClasificacionConsulta'];?></td>
                  <td><br><?php echo $estaf['Fecha'],"Hora: ", $estaf['Hora'];?></td>
                  <td><?php echo $estaf['DescripcionConsulta'];?></td>
                  <td>
                    <form action="editarconsulta.php" method="POST">
                      <button id="<?php echo "id".$estaf['idConsulta'];?>" name="editarconsulta" class="btn btn-default pull-right color: white;" value="<?php echo $estaf['idConsulta'];?>">Editar</button>
                    </form>
                    <button style="background-size: 30%;" class="btn btn-default pull-right" type="submit" data-toggle="modal" data-target="<?php echo "#Modal-".$estaf['idConsulta'];?>">Eliminar</button>
                </td>


                  <!-- Modal -->
                <div class="modal fade" id="<?php echo "Modal-".$estaf['idConsulta'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content" style="margin-top: 50%;">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Consulta</h5>
                      </div>

                      <div class="modal-body">
                        La Receta con el código #: <?php echo $estaf['idConsulta'];?> se eliminará y no podrás recuperarla.
                      </div>
                      <form action="medicoAgenda.php" method="POST">
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button id="elimnarconn" name="elimnarconn" type="submit" class="btn btn-primary" value="<?php echo $estaf['idConsulta'];?>">Sí, Eliminar</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                <?php
              }
              ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>



    <!-- Responder Consultas -->
    <form action="medicoAgenda.php" method="POST" id="mensaje" class="container-fluid text-center">
      <div class="col-sm-12;">
        <div class="container-fluid bg-grey">
          <h2 class="text-center">Enviar Receta Médica</h2>
          <h5 style="text-align: left;">Escribe el código del paciente para enviar un mensaje</h5>
          <div>
            <input class="form-control" id="cod" name="cod" placeholder="Ingresa el código del paciente" type="number"
              required>
          </div>

          <div class="col-sm-6 form-group" style="margin-top: 15px;">
            <h5 style="text-align: left;">Escribe el tratamiento ha seguir por el paciente:</h5>
            <input class="form-control" id="tratamiento" name="tratamiento" placeholder="Escribe el tratamiento para el paciente"
              type="text" style="height: 150px; " required>
          </div>

          <div class="col-sm-6 form-group" style="margin-top: 15px;">
            <h5 style="text-align: left;">Escribe el costo de la consulta y tratamiento en Total C$:</h5>
            <input class="form-control" id="costo" name="costo" placeholder="Costo Total: C$" type="number" required>
          </div>

          <div class="text-center">
            <div class="col-sm-6 form-group">
              <button id="submit" name="submit" style="background-size: 30%;" class="btn btn-default pull-right" type="submit">Enviar
                Mensaje</button>
            </div>
          </div>
        </div>
      </div>
      </form>

  </div>


  <!-- Editar Receta -->
  <div id="Receta" class="container-fluid text-center">
      <div class="container-fluid bg-grey" style="align-content: center;">
        <div>
          <h2 style="text-align: center;">Recetas enviadas</h2>
        </div>

        <div id="Receta" class="container-fluid bg-grey">
          <div class="table-responsive">
            <table class="table align-middle">
              <thead>
                <tr>
                <th scope="col" class="w-25">Receta</th>
                  <th scope="col" class="w-25">Tratamiento</th>
                  <th scope="col" class="w-25">Costo</th>
                  <th scope="col" class="w-25" style="text-align: center;">Opciones</th>
                </tr>
              </thead>
              <tbody style="text-align: left;">
              <?php
              while ($e=$re->fetch_assoc()) {
             ?>
                <tr>
                <td><?php echo $e['idReceta'];?></td>
                  <td><?php echo $e['Tratamiento'];?></td>
                  <td><br><?php echo $e['Costo'];?></td>
                  <form action="editar_receta.php" method="POST">
                  <td>
                    <button id="<?php echo "id".$e['idReceta'];?>" name="editarreceta" class="btn btn-default pull-right color: white;" value="<?php echo $e['idReceta'];?>">Editar</button>
                    </form>
                    <button style="background-size: 30%;" class="btn btn-default pull-right" type="submit" data-toggle="modal" data-target="<?php echo "#Modal-".$e['idReceta'];?>">Eliminar</button>
                  </td>

                         <!-- Modal -->
            <div class="modal fade" id="<?php echo "Modal-".$e['idReceta'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content" style="margin-top: 50%;">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Consulta</h5>

                  </div>

                  <div class="modal-body">
                    La Receta con el código #: <?php echo $e['idReceta'];?> se eliminará y no podrás recuperarla.
                  </div>
                  <form action="medicoAgenda.php" method="POST">
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button id="elimnarRes" name="elimnarRes" type="submit" class="btn btn-primary" value="<?php echo $e['idReceta'];?>">Sí, Eliminar</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
                </tr>
                <?php
              }
              ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
   

 
    <!-- Aquí va el Footer2 -->
<?php include_once("Templeat/footer2.php");?>