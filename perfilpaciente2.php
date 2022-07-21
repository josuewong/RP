<?php
include_once("app/Paciente.php");
include_once("app/Zonaprivada.php");
if (isset($_GET['logout']))
  {
    $uss->closeSesion();
    header('Location: index.php');
  }

  $conecta=new Paciente();

  $resultado = $conecta->verpaciente($_SESSION['usertag']);
  $est= $resultado->fetch_assoc();

if (isset($_POST['actualizarinfor'])) {
  $nom1=$_POST['p1'];
  $nom2=$_POST['p2'];
  $ap1=$_POST['a1'];
  $ap2=$_POST['a2'];
  $genero=$_POST['genero'];
  $fechaM=$_POST['fn'];
  $direc=$_POST['direccion'];
  $tell=$_POST['tel'];
  $rel=$_POST['rel'];
  $correo=$est['Correo'];
  
    $pass=$_POST['pass1'];
  

  $tipous=0;
  $idmedico=1;
  $idpaciente=$_SESSION['usertag'];

 $resultadow = $conecta-> actualizarpaciente($nom1,$nom2,$ap1,$ap2,$genero,$fechaM,$direc,$tell,$rel,$correo,$pass,$tipous,$idmedico,$idpaciente);
  header("location: perfilpaciente1.php");
}

  include_once("Templeat/head.php");
?>
  <title>EDITAR PERFIL</title>
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
            <li><a href="perfilpaciente1.php">Perfil</a>
            <li><a href="index.php?logout">Cerrar sesión</a></li>
          </ul>
        </div>
      </div>
    </nav>


    <!-- Editando Perfil -->
  <form action="perfilpaciente2.php" method="POST">
    <div class="container-fluid text-center" style="margin-top: 50px;">
      <div class="container-fluid bg-grey">
        <div class="content-text">
          <h2 class="col-sm-12" style="text-align: center;"><strong>Editando Mi Perfil Paciente</strong></h2>



          <div class="row" style="margin-bottom: 10px;">
            <div class="col-sm-3">
              <h5 style="text-align: left;">Ingresa tu primer nombre</h5>
              <input id="p1" name="p1" style="margin-bottom: 10px;" type="text" class="form-control" size="30"
                placeholder="Ingresa tu primer Nombre" value="<?php echo $est['PNombre'];?>">
            </div>

            <div class="col-sm-3">
              <h5 style="text-align: left;">Ingresa tu segundo nombre</h5>
              <input id="p2" name="p2" type="text" class="form-control" size="30" value=<?php echo $est['SNombre'];?>>
            </div>

            <div class="col-sm-3">
              <h5 style="text-align: left;">Ingresa tu primer apellido</h5>
              <input id="a1" name="a1" style="margin-bottom: 10px;" type="text" class="form-control" size="30"
                value=<?php echo $est['PApellido'];?>>
            </div>

            <div class="col-sm-3">
              <h5 style="text-align: left;">Ingresa tu segundo apellido</h5>
              <input id="a2" name="a2" type="text" class="form-control" size="30" value=<?php echo $est['SApellido'];?>>
            </div>

          </div>

          <div class="row" style="margin-bottom: 10px;">

            <div class="col-sm-12">
              <h5 style="text-align: left;">Ingresa un correo electrónico</h5>
              <input id="correo" name="correo" style="margin-bottom: 10px;" type="email" class="form-control" size="30"
                placeholder=<?php echo $est['Correo'];?>>
            </div>

            <div class="col-sm-6">
              <h5 style="text-align: left;">Crea una nueva contraseña</h5>
              <input id="pass1" name="pass1" style="margin-bottom: 10px;" type="password" class="form-control" size="30"
                placeholder="Ejemplo: C808080lk" required>
            </div>

            <div class="col-sm-6">
              <h5 style="text-align: left;">Vuelve a escribir la contraseña creada</h5>
              <input id="pass2" name="pass2" style="margin-bottom: 10px;" type="password" class="form-control" size="30"
                placeholder="Ejemplo: C808080lk" required>
            </div>

          </div>
          <div>

            <h5 style="text-align: left;">Escribe la dirección de tu hogar</h5>
            <input id="direccion" name="direccion" style="margin-bottom: 10px;" type="text" class="form-control" size="30"
              value=<?php echo $est['Direccion'];?>>


            <div class="row">
            <div class="col-sm-3 form-group">
            <h5 style="text-align: left;">Tu Genero actual es:</h5>
              <select id="genero" name="genero" class="form-control" class="from-select">
                <option selected><?php echo $est['Genero'];?></option>
                <option value="Mujer">Mujer</option>
                <option value="Hombre">Hombre</option>
              </select>
            </div>
              <div class="col-sm-3">
                <h5 style="text-align: left;">Tu fecha de Nacimiento actual es: </h5>
                <input id="fn" name="fn" style="margin-bottom: 10px;" class="form-control" id="FechaNacimiento" value=<?php echo $est['FNacimiento'];?>
                  type="date">
              </div>

              <div class="col-sm-3">
                <h5 style="text-align: left;">Ingresa tu número de teléfono</h5>
                <input id="tel" name="tel" style="margin-bottom: 10px;" type="text" class="form-control" size="30"
                  value=<?php echo $est['Telefono'];?> >
              </div>

              <div class="col-sm-3">
                <h5 style="text-align: left;">Ingresa tu religión</h5>
                <input id="rel" name="rel" style="margin-bottom: 10px;" type="text" class="form-control" size="30"
                  value=<?php echo $est['Religion'];?>>
              </div>
            </div>

          </div>
          <button id="actualizarinfor" name="actualizarinfor" class="btn btn-lg" type="submit"
            style="background-color:rgb(21, 87, 209); color: white; margin-top: 15px;">Actualizar</button>
        </div>

      </div>
    </div>
  </form>

  </div>


<!-- Aquí va el Footer2 -->
<?php include_once("Templeat/footer2.php");?>
