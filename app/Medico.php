<?php
 require_once('Conection.php');

     class Medico{
     private $idMedico;
     private $PNombre;
     private $SNombre;
     private $PApellido;
     private $SApellido;
     private $Genero;
     private $FNacimineto;
     private $Direccion;
     private $Telefono;
     private $NombreEspecialidad;
    private $con;

     public function __construct(){
          $this-> PNombre="";
          $this-> SNombre="";
          $this-> PApellido="";
          $this-> SApellido="";
          $this-> Genero="";
          $this-> FNacimineto="";
          $this-> Direccion="";
          $this-> Telefono=0;
          $this-> NombreEspecialidad="";
          $this-> con=new Conection();
     }
     /*
          public function getIdMedico()
          {
          return $this->idMedico;
          }

          public function setIdMedico($idMedico)
          {
          return $this->idMedico = $idMedico;
          }

          public function getPNombre()
          {
          return $this->PNombre;
          }

          public function setPNombre($Pnombre)
          {
          return $this->PNombre = $Pnombre;

          }

          public function getSNombre()
          {
          return $this->SNombre;
          }

          public function setSNombre($Snombre)
          {
          return $this->SNombre = $Snombre;

          }


          public function getPApellido()
          {
          return $this->PApellido;
          }

          public function setPApellido($Papellido)
          {
          return $this->PApellido = $Papellido;
          }

          public function getSApellido()
          {
          return $this->SApellido;
          }

          public function setSApellido($Sapellido)
          {
          return $this->SApellido = $Sapellido;

          }

          public function getGenero()
          {
          return $this->Genero;
          }

          public function setGenero($genero)
          {
          return $this->Genero = $genero;
          }

          public function getFNacimineto()
          {
          return $this->FNacimineto;
          }

          public function setFNacimineto($nacimineto)
          {
          return $this->FNacimineto = $nacimineto;

          }

          public function getDireccion()
          {
          return $this->Direccion;
          }

          public function setDireccion($direccion)
          {
          return $this->Direccion = $direccion;

          }

          public function getTelefono()
          {
          return $this->Telefono;
          }

          public function setTelefono($cel)
          {
          return $this->Telefono = $cel;

          }

          public function getNombreEspecialidad()
          {
               return $this->NombreEspecialidad;
          }

          public function setNombreEspecialidad($NombreEspecialidad)
          {
          return $this->NombreEspecialidad = $NombreEspecialidad;
          }


          //en la base de datos no indicamos eliminar un médico si retomamos esa función dejamos el codigo
          public function eliminarmedico($idMedico){
          //Eliminar médico de la base de datos
          }
     */
          public function actualizarmedico($PNombre,$SNombre,$PApellido,$SApellido,$Genero,$FNacimineto,$Direccion,$Telefono,$Especialidad,$Correo,$Pass,$TipoUsu,$idmedico)
          {
               //Editar o actualizar información en la base de datos
               $password=password_hash($Pass,PASSWORD_DEFAULT);
               mysqli_report(MYSQLI_REPORT_STRICT);
               try{
               $this->con->getCon()->query("call ActualizarMedico('$PNombre','$SNombre','$PApellido','$SApellido','$Genero','$FNacimineto','$Direccion','$Telefono','$Especialidad','$Correo','$password','$TipoUsu','$idmedico');");
                    return $this->con->getCon()->affected_rows;

               } catch(Exception $e){
                    return  "Error al guardar Usuario ( ". mysqli_errno($this->con->getCon()) .") ".
               $e->getMessage();

               }
          }
          

          public function agregarMedico($PNombre,$SNombre,$PApellido,$SApellido,$Genero,$Correo,$Pass,$FNacimineto,$Direccion,$Telefono,$Especialidad){
               //Añadir un Médico de la base de datos

               //$password=md5($Pass);
               $password=password_hash($Pass,PASSWORD_DEFAULT);
               // $pass->md5($Pass);
               mysqli_report(MYSQLI_REPORT_STRICT);


               try{
               $this->con->getCon()->query("call AgregarMedico('$PNombre','$SNombre','$PApellido','$SApellido','$Genero','$Correo','$password','$FNacimineto','$Direccion','$Telefono','$Especialidad');");
                    return $this->con->getCon()->affected_rows;

               } catch(Exception $e){
                    return  "Error al guardar Usuario ( ". mysqli_errno($this->con->getCon()) .") ".
               $e->getMessage();

               }
          }    

          public function vermedicos($fil){
               //Ver la información del médico de la base de datos
               $users=$this->con->getCon()->query("SELECT * FROM perfilmedico  where idMedico like '$fil%';");
                 return $users;
          }

          public function todoslosmedico(){
               //Ver la información del médico de la base de datos
               $users=$this->con->getCon()->query("SELECT * FROM medico;");
                 return $users;
          }



}
/*
session_start();
echo $_SESSION['usertag'];



   $conecta=new Medico();

$resultado = $conecta->vermedicos($_SESSION['usertag']);

if ($est= $resultado->fetch_assoc()) {
echo $est['PNombre'],$est['SNombre'],$est['PApellido'],$est['SApellido'];
 echo $est['Genero'];
 echo $est['FNacimiento'];
 echo $est['Direccion'];
 echo $est['Telefono'];
    echo "Cantidad de filas afectadas";
    echo "<br>";
}  else {
    echo "aun no reconoce";
}
*/
?>