<?php
 require_once('Conection.php');

    class Inicio_sesion{
        private $idInicio_sesion;
        private $Correo;
        private $Pass;
        private $Paciente_idPaciente;
        private $Medico_idMedico;
        private $con;

    public function __construct(){

        $this-> Correo="";
        $this-> Pass="";
        $this-> Paciente_idPaciente=0;
        $this-> Medico_idMedico=0;
        $this-> con=new Conection();
   }


        public function iniciarsesion($Correo,$Pass,$Paciente_idPaciente,$Medico_idMedico){
            //inicio de sesion
       }

       public function cerrarsesion($idInicio_sesion,$Correo,$Pass,$Paciente_idPaciente,$Medico_idMedico){
        //cerrar de sesion
   }

    public function login($Correo,$Pass)
    {
        // de sesion
            $users=$this->con->getCon()->query("SELECT * FROM login  where Correo = '$Correo';");

            if($users->num_rows)
        {

            echo "Existe el usuario   ";
            $usr=$users->fetch_assoc();
            // =md5($Pass)
            //$usr["Contraseña"]===md5($Pass)
            // password_verify($Pass,$usr["Contraseña"])
            //$usr["Contraseña"]===md5($Pass)
            if (password_verify($Pass,$usr["Contraseña"])) {
               // echo $Pass;
                echo "Existe la contra, pase";

                return $usr['idPaciente'];

            } else{

               // echo "no Existe la contra";
                return 0;
              // echo "No puede pasar";
            }


        } else
        {
           // echo "no Existe la el user";
            return 0;
        }

    }

    public function loginmedico($Correo,$Pass)
    {
        // de sesion
            $users=$this->con->getCon()->query("SELECT * FROM login2  where Correo = '$Correo';");

            if($users->num_rows)
        {

            echo "Existe el usuario   ";
            $usr=$users->fetch_assoc();
            // =md5($Pass)
            //$usr["Contraseña"]===md5($Pass)
            if (password_verify($Pass,$usr["Contraseña"])) {
               // echo $usr["Contraseña"];
               // echo $Pass;
                echo "Existe la contra, pase";

                return $usr['idMedico'];

            } else{

               // echo "no Existe la contra";
                return 0;
              // echo "No puede pasar";
            }


        } else
        {
           // echo "no Existe la el user";
            return 0;
        }

    }

}

/*
   $conet=new Inicio_sesion();
    $tag=$resultado=$conet->login('jonathan18@gmail.com','1234');
    if (!$tag==0) {
        echo $tag;

    }else {
        echo "Usuario y Contraseña incorrecto";
    }

   // echo "Hola";
   // var_dump( $resultado->fetch_assoc());

*/

?>