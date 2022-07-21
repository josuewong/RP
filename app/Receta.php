<?php
     require_once('Conection.php');
    class Receta{

        private $idReceta;
        private $Tratamiento;
        private $Costo;
        private $Medico_idMedico;
        private $Consulta_idConsulta;
        private $Paciente_idPaciente;
        private $con;

        public function __construct(){
            $this-> Tratamiento="";
            $this-> Costo="";
            $this-> Medico_idMedico="";
            $this-> Consulta_idConsulta="";
            $this-> Paciente_idPaciente="";
            $this-> con=new Conection();
       }

        public function getIdReceta()
        {
                return $this->idReceta;
        }

        public function setIdReceta($idReceta)
        {
            return $this->idReceta = $idReceta;

        }

        public function getTratamiento()
        {
                return $this->Tratamiento;
        }

        public function setTratamiento($tratamiento)
        {
            return $this->Tratamiento = $tratamiento;

        }

        public function getCosto()
        {
                return $this->Costo;
        }

        public function setCosto($costo)
        {
            return $this->Costo = $costo;

        }

        public function getMedico_idMedico()
        {
                return $this->Medico_idMedico;
        }

        public function setMedico_idMedico($medico_idmedico)
        {
            return $this->Medico_idMedico = $medico_idmedico;

        }


        public function getConsulta_idConsulta()
        {
                return $this->Consulta_idConsulta;
        }

        public function setConsulta_idConsulta($consulta_idconsulta)
        {
            return $this->Consulta_idConsulta = $consulta_idconsulta;

        }

        public function getPaciente_idPaciente()
        {
                return $this->Paciente_idPaciente;
        }

        public function setPaciente_idPaciente($paciente_idpaciente)
        {
            return $this->Paciente_idPaciente = $paciente_idpaciente;

        }

        public function enviarreceta($tratamiento,$costo,$idMedico,$idConsulta,$codigo){
            //enviar receta con su tratamiento y el costo al paciente
            mysqli_report(MYSQLI_REPORT_STRICT);
    
            try{
                $this->con->getCon()->query("call EnviarReceta('$tratamiento','$costo','$idMedico','$idConsulta','$codigo');");
                 return $this->con->getCon()->affected_rows;
    
            } catch(Exception $e){
                 return  "Error al guardar Consulta ( ". mysqli_errno($this->con->getCon()) .") ".
                $e->getMessage();
    
            }
       }

        public function verreceta($fil){
            //Ver resata segun el id del paciente
            $users=$this->con->getCon()->query("SELECT * FROM receta where Paciente_idPAciente like '$fil%';");
            return $users;
        }
        public function allRecetas(){
            //Ver resata segun el id del paciente
            $users=$this->con->getCon()->query("SELECT * FROM receta;");
            return $users;
        }

        public function eliminarReceta($idReceta){
            //Eliminar Receta

            $users=$this->con->getCon()->query("DELETE FROM receta WHERE idReceta = '$idReceta%';");
            return $this->con->getCon()->affected_rows;
        }
        

        public function ActualizarReceta($idreceta,$Tratamiento,$Costo,$Medico_idMedico)
        {
             //Editar o actualizar información en la base de datos
             mysqli_report(MYSQLI_REPORT_STRICT);
             try{
             $this->con->getCon()->query("call ActualizarReceta('$Tratamiento','$Costo','$Medico_idMedico','$idreceta');");
                  return $this->con->getCon()->affected_rows;

             } catch(Exception $e){
                  return  "Error al guardar Usuario ( ". mysqli_errno($this->con->getCon()) .") ".
             $e->getMessage();

             }
        }

    }
/*
    $s=new Receta();
        echo $res=$s->eliminarReceta('15');

     
    $re=$s->verreceta('1');
   $res= $re->fetch_assoc();
   echo $res['Tratamiento'];
   
         */
?>