
<?php
include_once("app/Zonaprivada.php");
include_once("app/Consulta.php");
include_once("app/Receta.php");
include_once("app/Paciente.php");
include_once("app/Medico.php");
$p=new Consulta();

    if (isset($_POST['submit'])) {
      // echo var_dump($_POST);
      
       $clasif=$_POST['clasificacion'];
       $descr=$_POST['descripcion'];
       $fecha=$_POST['fecha'];
       $hora=$_POST['hora'];

         
         if ($p->crearcita($clasif,$descr,$fecha,$hora,$_SESSION['usertag'])) {
          // echo "Usuario agregado exitosamente";

         }else {
           //echo "Usuario no agregado";

         }

     }

     $res=$p->verconsulta($_SESSION['usertag']);
     
     $s=new Receta();
    $re=$s->verreceta($_SESSION['usertag']);
   
    $conecta=new Paciente();

  $resultado = $conecta->verpaciente($_SESSION['usertag']);
  $est= $resultado->fetch_assoc();

  $me=new Medico();

  $resultado22 = $me->todoslosmedico();
  
 // Editar consulta

if (isset($_POST['eliminar'])) {
 //var_dump($_POST['eliminar']);
   $result=$p->eliminarcons($_POST['eliminar']);
   header("location: sesionpaciente.php#Historial");
}
//if (isset($_POST['editar'])) {
//  header("location: editar_agenda.php");
//}


include_once("Templeat/head.php");
?>


<title>CONSULTORIO</title>
</head>

<body id="Inicio" data-spy="scroll" data-target=".navbar" data-offset="60">
  <!-- Navegación -->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="sesionpaciente.php">inicio</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="perfilpaciente1.php">Perfil</a></li>
          <li><a href="#Agendar">Consulta Médica</a></li>
          <li><a href="#Historial">Historial</a></li>
          <li><a href="#Acercade">Acerca de</a></li>
          <li><a href="index.php?logout">Cerrar sesión</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div id="Inicio" class="container-fluid">
    <!-- Titulo -->
    <div>
      <h1 class="container-fluid text-center" style="color:black; margin-bottom: 15px;"><strong>CONSULTORIO DE
          FE</strong></h1>
    </div>


    <!-- Imagenes de la página -->
    <div class="container-fluid bg-grey">
      <div class="row" style="text-align: center;">

        <div class="col-sm-4">
          <span class="border border-primary"> <a> <img src="img/imagenConsultorio1.jpg" width="320" height="250"></a>
          </span>
          <p><strong>Medicina General</strong></p>
          <p>Lorem ipsum dolor sit amet..</p>

        </div>

        <div class="col-sm-4">
          <span> <a> <img src="img/imagenConsultorio2.jpg" width="320" height="250"></a> </span>
          <p><strong>Medicina en Pediatria</strong></p>
          <p>Lorem ipsum dolor sit amet..</p>
        </div>

        <div class="col-sm-4">
          <span> <a> <img src="img/imagenConsultorio3.jpg" width="320" height="250"></a> </span>
          <p><strong>Medicina en Dontología</strong></p>
          <p>Lorem ipsum dolor sit amet..</p>

        </div>

        <div class="col-sm-4">
          <span> <a> <img src="img/imagenConsultorio4.jpg" width="320" height="250"></a> </span>
          <p><strong>Consultas Medicas</strong></p>
          <p>Lorem ipsum dolor sit amet..</p>

        </div>

        <div class="col-sm-4">
          <span> <a> <img src="img/imagenConsultorio5.jpg" width="320" height="250"></a> </span>
          <p><strong>Recetas Medicas</strong></p>
          <p>Lorem ipsum dolor sit amet..</p>

        </div>

        <div class="col-sm-4">
          <span> <a> <img src="img/imagenConsultorio6.jpg" width="320" height="250"></a> </span>
          <p><strong>Seguimiento Médico</strong></p>
          <p>Lorem ipsum dolor sit amet..</p>

        </div>

      </div>
    </div>



    <!-- Descripción de la página -->
    <div class="container-fluid text-center" style="margin-top: 30px; margin-bottom: 30px;">

      <p class="col-sm-6">
        No olvidemos nuestra salud!
        En el Consultorio de Fe estamos esperando por ustedes!
        Por todo el mes de Noviembre estamos con descuentos en las consultas agendadas.
        La salud es primero.
      </p>

      <p class="col-sm-6">
        Les atendemos con calidad y siempre con las medidas de higiene necesarias ante el covid-19.
        Les esperamos, Estamos ubicados en km 9.5 carretera vieja a León, comarca nejapa del colegio Pablo Neruda 300
        metros oeste mano derecha!
      </p>
    </div>


    <!-- Agendar -->
    <form action="sesionpaciente.php" method="POST" id="Agendar" class="container-fluid bg-grey" class="container-fluid text-center">
      <h2 class="text-center">Agendar Consulta</h2>
      <div class="row">
        <div class="col-sm-4">
          <p>Contactos de emergencias las 24 horas.</p>
          <p><span class="glyphicon glyphicon-map-marker"></span> Consultorio.Managua, Nic</p>
          <p><span class="glyphicon glyphicon-phone"></span> +505 8888 8888</p>
          <p><span class="glyphicon glyphicon-envelope"></span> consultoriodefe@gmail.com</p>
        </div>

        <div class="col-sm-8">
          <div class="row">

            <div class="col-sm-12 form-group">
              <h5>Clasifica para quien es la consulta</h5>
              <select class="form-control" id="clasificacion" name="clasificacion" class="from-select" arial label="Defaul select example" required>
                <option selected>Clasificación de la cosulta</option>
                <option value="Adulto">Adulto</option>
                <option value="Adolecente">Adolecente</option>
                <option value="Niño">Niño</option>
              </select>
            </div>

            <div class="col-sm-6 form-group" style="left: 0px; right: 50px;">
              <h5>Establece una fecha para la consulta</h5>
              <input class="form-control" id="fecha" name="fecha" placeholder="Fecha de la cita" type="date"
                required>
            </div>

            <div class="col-sm-6 form-group">
              <h5>Establece una hora para la consulta</h5>
              <input class="form-control" id="hora" name="hora" placeholder="Hora" type="time" required>
            </div>

            <div class="col-sm-12 form-group">
              <h5>Describe el estado en el que te enceuntras, sintomas que has tenido, entre otros detalles para poder
                evaluarte.</h5>
              <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción de la consulta"
                rows="5"></textarea><br>
              </div>

            <div class="text-center">
              <div class="col-sm-12 form-group">
                <button style="background-size: 30%;" class="btn btn-default pull-right" name="submit" type="submit">Agendar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
      
    

    
      <!-- Consultas agendadas -->
    <div id="Historial" class="row">
      <div class="container-fluid text-center; col-sm-6">
        <div class="list-group-item" style="margin-bottom: 15px; text-align: left;">
          <h4>Puedes editar una cita que reviamente has agendado a como tambien puedes eliminarla.</h4>
        </div>


        <form action="sesionpaciente.php" method="POST">
        <ul class="list-group" style="text-align: left;">
        <?php
              while ($estaf=$res->fetch_assoc()) {
                # code...
          ?>

          <li class="list-group-item">
            <input class="form-check-input me-1" name="checkbox" type="checkbox" value="" aria-label="...">
            <p>Códico consulta: <?php echo $estaf['idConsulta'];?> <br>
              Clasificación de la cosulta: <?php echo $estaf['ClasificacionConsulta'];?> <br>
              Fecha; <?php echo $estaf['Fecha'],"  Hora: ", $estaf['Hora'];?>  <br>
              Descripción de Consulta: <?php echo $estaf['DescripcionConsulta'];?> </p>

              <div class="row">
            <div class="col-ms-6" style="right: 15px; left: 15px;">
            <button type="button" class="btn btn-default pull-right color: white;" data-toggle="modal" data-target="<?php echo "#Modal-".$estaf['idConsulta'];?>">Eliminar</button>
            </div>

                     <!-- Modal -->
            <div class="modal fade" id="<?php echo "Modal-".$estaf['idConsulta'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content" style="margin-top: 50%;">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Consulta</h5>

                  </div>

                  <div class="modal-body">
                    La consulta con el código #: <?php echo $estaf['idConsulta'];?> se eliminará y no podrás recuperarla.
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button id="eliminar" name="eliminar" type="submit" class="btn btn-primary" value="<?php echo $estaf['idConsulta'];?>">Sí, Eliminar</button>
                  </div>
                  
                </div>
              </div>
            </div>
        </form>
            <form action="editar_agenda.php" method="POST">

            <div class="col-ms-6" style="right: 15px;" id="<?php echo "id".$estaf['idConsulta'];?>">
            <button id="<?php echo "id".$estaf['idConsulta'];?>" name="editar" type="submit" class="btn btn-default pull-right color: white;" value="<?php echo $estaf['idConsulta'];?>">Editar</button>
            </div>

            </form>

          </div>
          </li>
          
          <?php
              }
              ?>
        </ul>
        
      </div>

      <div class="container-fluid text-center; col-sm-6">
        <div class="list-group-item" style="margin-bottom: 15px; text-align: left;">
          <h4>Mensaje de recetas del Médico</strong> receta para el segimiento de tu consulta.</h4>
        </div>
        <ul class="list-group" style="text-align: left;">
        <?php
              while ($act= $re->fetch_assoc()) {
                # code...
              
          ?>

          <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
            <p><br>Trataniento indicado: <?php echo $act['Tratamiento'];?>
              Costo de la cosulta: <?php echo $act['Costo'];?><br></p>
          </li>
          <?php
              }
              ?>
        </ul>
      </div>
    </div>


    <!-- Historial -->
    <div class=" container-fluid text-center">

      <h2>Salas de nuestro Consultorio</h2><br>
      <h4>Para nosotros eres especias te recordamos porque eres parte de nuestro gran labor</h4>

      <div>
        <div class="col-sm-4">
          <div class="thumbnail">
            <img src="img/inicio/con1.jpg" alt="Consultorio 1" width="400" height="300">
            <p><strong>Sala de Medicamentos</strong></p>
            <p>Productos Calificados</p>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="thumbnail">
            <img src="img/inicio/con2.jpg" alt="Consultorio 2" width="400" height="300">
            <p><strong>Sala de Consulta</strong></p>
            <p>Atención a sus necesidades</p>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="thumbnail">
            <img src="img/inicio/con1.jpg" alt="Consultorio 3" width="400" height="300">
            <p><strong>Sala Quirurjica</strong></p>
            <p>Tratamiento y Cuidado Especial</p>
          </div>
        </div>

        
      </div><br>
    </div>

    <!-- Expediente -->
    <div class="container-fluid bg-grey" style="margin-bottom: 50px; margin-top: 10px;">
    <h2 style="text-align: center;">Datos Importantes</h2>
      <h3 class="col-sm-6"><strong>Mi Expediente</strong></h3>
      <h3 class="col-sm-6"> <strong>Médicos Calificados para tu salud</strong></h3>

      <div class="col-sm-6" style="text-align: left;">
        <ol class="list-group list-group-numbered">
          <li class="list-group-item">Número de Expediente: <?php echo $_SESSION['usertag'];?></li>
          <li class="list-group-item">Nombre y Apellido: <?php echo $est['PNombre']," ",$est['SNombre']," ",$est['PApellido']," ",$est['SApellido'];?></li>
          <li class="list-group-item">Genero: <?php echo $est['Genero'];?></li>
          <li class="list-group-item">Fecha de Nacimiento: <?php echo $est['FNacimiento'];?></li>
          <li class="list-group-item">Direción: <?php echo $est['Direccion'];?></li>
          <li class="list-group-item">Número de Teléfono: <?php echo $est['Telefono'];?></li>
          <li class="list-group-item">Religión: <?php echo $est['Religion'];?></li>
        </ol>
      </div>

      <div class="col-sm-6" style="text-align: left;">
        <ol class="list-group list-group-numbered">
        <?php
              while ($est2= $resultado22->fetch_assoc()) {
                # code...;
              
          ?>

            <li class="list-group-item">
            <p>
              <strong>Dr@. <?php echo $est2['PNombre']," ", $est2['PApellido'];?></strong> <br>
              Especialidas en: <?php echo $est2['NombreEspecialidad'];?><br> Teléfono: <?php echo $est2['Telefono'];?>
            </p>
          </li>
          <?php
              }
              ?>
          
        </ol>
      </div>

    </div>


    <!-- Promociones -->
    <div id="pricing" class="container-fluid">
      <div class="text-center">
        <h2>Promociones</h2>
        <h4>Conoce un poco de las promociones de este mes</h4>
      </div>
      <div class="row">
        <div class="col-sm-4 col-xs-12">
          <div class="panel panel-default text-center">
            <div class="panel-heading">
              <h1>Del día 1 al 9</h1>
            </div>
            <div class="panel-body">
              <p><strong>1</strong> Consulta</p>
              <p><strong>Des.10%</strong> Medicamentos</p>
              <p><strong>Gratis</strong> Seguimiento con Tratamiento</p>
              <p><strong>Gratis</strong> Receta</p>
            </div>
            <div class="panel-footer">
              <h3>C$ 80</h3>
              <h4>Precio sugerido a tan solo</h4>
              <a href="#Agendar" class="btn btn-lg">Agendar</a>
            </div>
          </div>
        </div>

        <div class="col-sm-4 col-xs-12">
          <div class="panel panel-default text-center">
            <div class="panel-heading">
              <h1>Del día 10 al 18</h1>
            </div>
            <div class="panel-body">
              <p><strong>1</strong> Consulta</p>
              <p><strong>Des.10%</strong> Medicamentos</p>
              <p><strong>Gratis</strong> Seguimiento con Tratamiento</p>
              <p><strong>Gratis</strong> Receta</p>
            </div>
            <div class="panel-footer">
              <h3>C$ 150</h3>
              <h4>Precio sugerido a tan solo</h4>
              <a href="#Agendar" class="btn btn-lg">Agendar</a>
            </div>
          </div>
        </div>

        <div class="col-sm-4 col-xs-12">
          <div class="panel panel-default text-center">
            <div class="panel-heading">
              <h1>Del día 19 al 31</h1>
            </div>
            <div class="panel-body">
              <p><strong>1</strong> Consulta</p>
              <p><strong>Des.10%</strong> Medicamentos</p>
              <p><strong>Gratis</strong> Seguimiento con Tratamiento</p>
              <p><strong>Gratis</strong> Receta</p>
            </div>
            <div class="panel-footer">
              <h3>C$ 200</h3>
              <h4>Precio sugerido a tan solo</h4>
              <a href="#Agendar" class="btn btn-lg">Agendar</a>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Llamada a Contácto -->
    <div id="Acercade"></div>
    <?php
     include_once("Templeat/carrusel_contactos.php");
    ?>

    <!-- Acerca de -->
    <div class="container-fluid bg-grey">
      <div class="row">
        <div class="col-sm-4">
          <span> <a> <img src="img/inicio/Consultorio.jpg" width="400" height="300"></a> </span>
        </div>
        <div class="col-sm-6" style="left: 80px;">
          <h2>Consultorio de Fe</h2><br>
          <h4><strong>Consultorio:</strong>Trabajamos por tu salud de la mano contigo, comprometidos con la sociedad
            generando avances
            para seguir siempre contectados</h4><br>
        </div>
      </div>

      <div style="margin-top: 20px;" class="row">
        <div class="col-sm-4">
          <p><strong>Misión:</strong>Nuestro propósito es seguir adelante mejorando y logrando la satisfacción a
            nuestros pacientes, poco a poco
            iremos cumpliendo nuestros objetivos sin dejar de lado la prudencia y la preocupación por nuestros
            pacientes, Dios les bendiga
            Ver menos
        </div>

        <div class="col-sm-4">
          <p><strong>VISION:</strong> Our vision Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
            ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </div>

        <div class="col-sm-4">
          <p><strong>Puedes contactarnos a traves de nuestras redes:</strong></p>
          <div>
            <li><a href="#">Facebook</a></li>
          </div>

          <div>
            <li><a href="#">Whatsapp</a></li>
          </div>

          <div>
            <li><a href="#">Gmail</a></li>
          </div>
        </div>
      </div>
    </div>

  </div>



<!-- Llamada al Footer1 -->
<?php
  include_once("Templeat/footer1.php");
?>
