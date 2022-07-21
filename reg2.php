<?php
include_once("app/Medico.php");
// include_once("app/Zonaprivada.php");
if (isset($_POST['submit'])) {
    // echo var_dump($_POST);
    
   
     $Pnombree=$_POST['Pnombre'];
     $Snombree=$_POST['Snombre'];
     $Papellidoo=$_POST['Papellido'];
     $Sapellidoo=$_POST['Sapellido'];
     $generoo=$_POST['genero'];
     $correoo=$_POST['correo'];
   
     $passs=$_POST['pass1'];
   
     $nacimientoo=$_POST['nacimiento'];
     $direccionn=$_POST['direccion'];
     $cell=$_POST['cel'];
     $especialidad=$_POST['NombreEspecialidad'];

  //  var_dump($_POST);
       $p=new Medico();
       if ($p->agregarMedico($Pnombree,$Snombree,$Papellidoo,$Sapellidoo,$generoo,$correoo,$passs,$nacimientoo,$direccionn,$cell,$especialidad)) {
       //  echo "Usuario agregado exitosamente";
       header("Location: index.php#sesion2");
       }else {
         //echo "Usuario no agregado";

       }

   }
   include_once("Templeat/head.php");
?>


<!--Aquí va la navegación del index-->
<!--Contenido del index-->
<!-- Llamada a Contácto -->
    <?php
        include_once("Templeat/nav_reg_index.php");
        include_once("Templeat/contenido_index.php");
        include_once("Templeat/carrusel_contactos.php");
    ?>

<!-- Registro de Sesión-->
<form action="reg2.php" method="POST" id="asd" class="container-fluid text-center">
            <div class="window-notice" id="window-notice">

                <div class="content">
                    <div class="content-text">
                        <h2 class="col-sm-12" style="text-align: center;">Crear cuenta de Médico</h2>

                        <div class="col-sm-6">
              <input style="margin-bottom: 10px;" id="Pnombre" name="Pnombre" type="text" class="form-control" size="30"
                placeholder="Ingresa tu Primer Nombre" required>
              <input type="text" class="form-control" size="30" id="Papellido" name="Papellido" placeholder="Ingresa tu Primer Apellido" required>
            </div>

            <div class="col-sm-6" style="margin-bottom: 10px;">
              <input style="margin-bottom: 10px;" id="Snombre" name="Snombre" type="text" class="form-control" size="30"
                placeholder="Ingresa tu Segundo Nombre" required>
              <input type="text" class="form-control" size="30" id="Sapellido" name="Sapellido" placeholder="Ingresa tu Segundo Apellido" required>
            </div>

            <div class="col-sm-12 form-group">
              <select id="genero" name="genero" class="form-control" class="from-select" required>
                <option selected>Indica tu genero</option>
                <option value="Mujer">Mujer</option>
                <option value="Hombre">Hombre</option>
              </select>
            </div>

            <div style="margin-bottom: 10px;">
              <input style="margin-bottom: 10px;" type="text" class="form-control" id="correo" name="correo" size="30"
                placeholder="Registrate con tu correo" required>

              <input style="margin-bottom: 10px;" type="password" class="form-control" id="pass1" name="pass1" size="30"
                placeholder="Crea una contraseña" required>
              <input style="margin-bottom: 10px;" type="password" class="form-control" id="pass2" name="pass2" size="30"
                placeholder="Repite la contraseña" required>
            </div>

            <div>
              <input style="margin-bottom: 10px;" id="nacimiento" name="nacimiento" class="form-control" placeholder="Hora" type="date" required>

              <input style="margin-bottom: 10px;" type="text" class="form-control" id="direccion" name="direccion" size="30"
                placeholder="Dirección de Adomicilio" required>

              <input style="margin-bottom: 10px;" type="text" class="form-control" id="cel" name="cel" size="30"
                placeholder="Ingresa tu Número de Telefono" required>

                <input  id="NombreEspecialidad" name="NombreEspecialidad" style="margin-bottom: 10px;" type="text" class="form-control" size="30" placeholder="Ingresa tu Especialidad como Médico" required>

            </div>
                    

                        <div>
                            <a href="index.php" class="btn btn-lg" style="background-color:rgb(7, 80, 216); color: white; margin-top: 30px;">Cancelar y Regresar</a>

                            <button id="submit" name="submit" class="btn btn-lg" style="background-color:rgb(7, 80, 216); color: white; margin-top: 30px;" >Aceptar</button>  
                        </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>


<!-- Llamada al Footer1 -->
<?php
  include_once("Templeat/footer1.php");
?>
