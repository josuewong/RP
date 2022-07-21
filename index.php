<?php
  include_once("app/Inicio_sesion.php");
  include_once("app/UserSesion.php");
  $uss=new UserSesion();
  //echo $_SESSION['usertag'];
  if (isset($_GET['logout']))
    {
      $uss->closeSesion();
     header('Location: index.php');
    }

    // //Login para el Paciente

    if (isset($_POST['user'])) {
    $Correo=$_POST['user'];
    $Contraseña=$_POST['pass'];
   
    $cont=new Inicio_sesion();
   $tag=$resultado=$cont->login($Correo, $Contraseña);
  
   if (!$tag==0) {

      $uss->setCurrentUser($tag);
    header("Location: sesionpaciente.php");

    }else {
      $uss->closeSesion();
      //$clasemensaje="";
     // $clasemensaje="Contraseña incorrecta";
      header("Location: sesionpaciente.php#sesion1");
    
    }
  }else {
    // $clasemensaje="";
  }


  //Login para el Medico

  if (isset($_POST['user2'])) {
    $Correo=$_POST['user2'];
    $Contraseña=$_POST['pass2'];

    $cont=new Inicio_sesion();
   $tag=$resultado=$cont->loginmedico($Correo, $Contraseña);

   if (!$tag==0) {

      $uss->setCurrentUser($tag);
    header("Location: medicoAgenda.php");

    }else {
      $uss->closeSesion();
     // $clasemensaje="";
    }
  }else {
    // $clasemensaje="";
  }

  include_once("Templeat/head.php");
 /**/
 
?>



<title>INICIO DE SESIÓN</title>
</head>

<body id="Inicio" data-spy="scroll" data-target=".navbar" data-offset="60">
  <!--Navegación-->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#Inicio">inicio</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#sesion1">Sesión Paciente</a></li>
          <li><a href="#sesion2">Sesión Médico</a></li>
        </ul>
      </div>

    </div>
  </nav>


<!--Contenido del index-->
  <?php
    include_once("Templeat/contenido_index.php");

  ?>

<!-- Llamada a Contácto -->
  <?php
    include_once("Templeat/carrusel_contactos.php");
  ?>

  <!-- inicio de Sesión 1-->
  <form action="index.php" method="POST">

    <div id="sesion1" class="modalDialog">
      <div>
        <a href="#close" title="Close" class="close">X</a>
        <h2>Inicio como Paciente</h2>

        <div class="col-sm-12 form-group">
          <h6 style="text-align: left;">Registrate con tu correo</h6>
          <input class="form-control" id="user" name="user" placeholder="Ejemplo: juandavila@gmail.com" type="text" required>
        </div>

        <div class="col-sm-12 form-group">
          <h5 style="text-align: left;">Escribe tu contraseña</h5>
          <input class="form-control" id="pass" name="pass" placeholder="Contraseña creada al registrarse" type="password"
            required>
        </div>

        <div class="col">

          <div class="col-sm-6">
            <Button id="submit" name="submit" class="btn btn-lg" type="submit"
              style="background-color: rgb(7, 80, 216); color: white; margin-left: 10px;">Confirmar</Button>
          </div>

          <div class="col-sm-6">
            <a href="reg1.php" class="btn btn-lg"
              style="background-color:rgb(7, 80, 216); color: white;">Regristrarme</a>
          </div>
        </div>
        <p>Inicio debes ingresar tu correo y contraseña</p>
       <!-- <table class="alert alert-danger tect-light <?php echo $clasemensaje;?>" role="alert">Correo y Contraseña incorrecto</table> -->
      </div>
    </div>
  </form>



    <!-- inicio de Sesión 2-->
    <form action="index.php" method="POST">
    <div id="sesion2" class="modalDialog">
      <div>
        <a href="#close" title="Close" class="close">X</a>
        <h2>Inicio como Médico</h2>

        <div class="col-sm-12 form-group">
          <h6 style="text-align: left;">Registrate con tu correo</h6>
          <input class="form-control" id="user2" name="user2" placeholder="Ejemplo: consultoriodefe@gmail.com" type="text" required>
        </div>

        <div class="col-sm-12 form-group">
          <h5 style="text-align: left;">Escribe tu contraseña</h5>
          <input class="form-control" id="pass2" name="pass2" placeholder="Contraseña creada al registrarse" type="password"
            required>
        </div>

        <div class="col">

          <div class="col-sm-6">

          <Button id="submit2" name="submit2" class="btn btn-lg" type="submit"
              style="background-color: rgb(7, 80, 216); color: white; margin-left: 10px;">Confirmar</Button>

          </div>

          <div class="col-sm-6">
            <a href="reg2.php" class="btn btn-lg"
              style="background-color:rgb(7, 80, 216); color: white;">Regristrarme</a>
          </div>

        </div>
        <p>Inicio debes ingresar tu correo y contraseña</p>
      </div>
    </div>
    </form>


<!-- Llamada al Footer1 -->
<?php
  include_once("Templeat/footer1.php");
?>
