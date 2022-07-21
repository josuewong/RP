<?php
 require_once('Conection.php');

     class Paciente{
     private $idPaciente;
     private $PNombre;
     private $SNombre;
     private $PApellido;
     private $SApellido;
     private $Genero;
     private $FNacimineto;
     private $Direccion;
     private $Telefono;
     private $Religion;
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
          $this-> Religion="";
          $this-> con=new Conection();
     }


     public function agregarpaciente($PNombre,$SNombre,$PApellido,$SApellido,$Genero,$Correo,$Pass,$FNacimineto,$Direccion,$Telefono,$Religion){
          //Añadir o agregar paciente a la base de datos

       // $password=md5($Pass);
        $password=password_hash($Pass,PASSWORD_DEFAULT);
          mysqli_report(MYSQLI_REPORT_STRICT);


          try{
              $this->con->getCon()->query("call AgregarUsurio('$PNombre','$SNombre','$PApellido','$SApellido','$Genero','$Correo','$password','$FNacimineto','$Direccion','$Telefono','$Religion');");
               return $this->con->getCon()->affected_rows;

          } catch(Exception $e){
               return  "Error al guardar Usuario ( ". mysqli_errno($this->con->getCon()) .") ".
              $e->getMessage();

          }
     }

     public function buscarpaciente($filter){
          //Busqueda de un paciente en la base de datos
          $users=$this->con->getCon()->query("SELECT * FROM perfil_paciente where PNombre like '$filter%';");
          return $users;
     }

     public function verpaciente($fil){
          //Busqueda de un paciente en la base de datos
          $users=$this->con->getCon()->query("SELECT * FROM perfilpaciente  where idPaciente like '$fil%';");
          return $users;
     }


     public function actualizarpaciente($PNombre,$SNombre,$PApellido,$SApellido,$Genero,$FNacimineto,$Direccion,$Telefono,$Religion,$Correo,$Pass,$TipoUsu,$idmedico,$idPaciente){
          //Editar o actualizar información en la base de datos


          //$password=md5($Pass);
         $password=password_hash($Pass,PASSWORD_DEFAULT);
          mysqli_report(MYSQLI_REPORT_STRICT);

          try{
              $this->con->getCon()->query("call ActualizarPaciente('$PNombre','$SNombre','$PApellido','$SApellido','$Genero','$FNacimineto','$Direccion','$Telefono','$Religion','$Correo','$password','$TipoUsu','$idmedico','$idPaciente');");
               return $this->con->getCon()->affected_rows;

          } catch(Exception $e){
               return  "Error al guardar Usuario ( ". mysqli_errno($this->con->getCon()) .") ".
              $e->getMessage();

          }
     }

     // en la base de datos no indicamos eliminar un paciente del registro de la base de datos si retomamos esa función dejamos el codigo
     public function eliminarpaciente($idPaciente){
          //Eliminar paciente de la base de datos

     }




}


/*
$p=new Paciente();
 echo $resultado = $p-> actualizarpaciente('jonathan','josue','wo','ve','Hombre','2000-12-18','asd','88888888','ggg','real','asd123','0','1','45');

*/

 /*
session_start();
echo $_SESSION['usertag'];



   $conecta=new Paciente();

$resultado = $conecta->verpaciente($_SESSION['usertag']);

if ($est= $resultado->fetch_assoc()) {
echo $est['PNombre'],$est['SNombre'],$est['PApellido'],$est['SApellido'];
 echo $est['Genero'];
 echo $est['FNacimiento'];
 echo $est['Direccion'];
 echo $est['Telefono'];
 echo $est['Correo'];
    echo "Cantidad de filas afectadas";
    echo "<br>";
}  else {
    echo "aun no reconoce";
}


 $p=new Paciente();
echo $p->agregarpaciente('asdfdad','adfdf','afnnneg','nnnnn','fhgh','wwwwww','1234','1999-12-14','hgug','56416546','drythth');
echo var_dump($_POST);
*/
?>