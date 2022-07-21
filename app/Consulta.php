<?php
     require_once('Conection.php');
    class Consulta{
        private $idConsulta;
        private $ClasificacionConsulta;
        private $DescripcionConsulta;
        private $Fecha;
        private $Hora;
        private $Paciente_idPaciente;
        private $Medico_idMedico;
        private $con;


        public function __construct()
        {
            $this->ClasificacionConsulta="";
            $this->DescripcionConsulta="";
            $this->Fecha="";
            $this->Hora="";
            $this->Paciente_idPaciente="";
            $this->Medico_idMedico="";
            $this-> con=new Conection();
        }

        public function getIdConsulta()
        {
                return $this->idConsulta;
        }

        public function setIdConsulta($idConsulta)
        {
            return $this->idConsulta = $idConsulta;

        }

        public function getClasificacionConsulta()
        {
                return $this->ClasificacionConsulta;
        }

        public function setClasificacionConsulta($clasificacionconsul)
        {
            return $this->ClasificacionConsulta = $clasificacionconsul;

        }

        public function getDescripcionConsulta()
        {
                return $this->DescripcionConsulta;
        }

        public function setDescripcionConsulta($descripcionconsul)
        {
            return $this->DescripcionConsulta = $descripcionconsul;

        }

        public function getFecha()
        {
                return $this->Fecha;
        }

        public function setFecha($fecha)
        {
            return $this->Fecha = $fecha;

        }

        public function getHora()
        {
                return $this->Hora;
        }

        public function setHora($hora)
        {
            return $this->Hora = $hora;

        }

        public function getPaciente_idPaciente()
        {
                return $this->Paciente_idPaciente;
        }

        public function setPaciente_idPaciente($paciente_idpaciente)
        {
            return $this->Paciente_idPaciente = $paciente_idpaciente;

        }

        public function getMedico_idMedico()
        {
                return $this->Medico_idMedico;
        }

        public function setMedico_idMedico($medico_idmedico)
        {
            return $this->Medico_idMedico = $medico_idmedico;

        }

        public function crearcita($clasificacion,$descripcion,$fecha,$hora,$idPaciente){
            //Añadir o agregar paciente a la base de datos
            mysqli_report(MYSQLI_REPORT_STRICT);
    
            try{
                $this->con->getCon()->query("call AgregarConsulta('$clasificacion','$descripcion','$fecha','$hora','$idPaciente');");
                 return $this->con->getCon()->affected_rows;
    
            } catch(Exception $e){
                 return  "Error al guardar Consulta ( ". mysqli_errno($this->con->getCon()) .") ".
                $e->getMessage();
    
            }
        }

        public function eliminarconsulta($idConsulta){
            //Eliminar consulta

            $users=$this->con->getCon()->query("SELECT c.idConsulta, c.ClasificacionConsulta, c.DescripcionConsulta, c.Fecha, c.Hora, c.Paciente_idPaciente, c.Medico_idMedico FROM consulta c where idConsulta like '$idConsulta%';");
          return $users->fetch_assoc();
       }


        public function eliminarcons($idConsulta){
                    //Eliminar consulta

                    $users=$this->con->getCon()->query("DELETE FROM consulta WHERE (idConsulta = '$idConsulta%');");
                return $this->con->getCon()->affected_rows;
            }



       public function verconsulta($fil){
        //ver consultan dependiendo ip paciente
        $users=$this->con->getCon()->query("SELECT * FROM consulta where Paciente_idPaciente like '$fil%';");
          return $users;
        }
        public function verconsulta_mdi($fil){
            //ver consultan dependiendo ip paciente
            $users=$this->con->getCon()->query("SELECT * FROM consulta where idConsulta like '$fil%';");
              return $users;
            }

        public function TodaslasConsultas()
        {
            //ver tratamiento de la consultan
            $users=$this->con->getCon()->query("SELECT * FROM listaconsulta;");
              return $users;
        }

        public function actualizarconsulta($id,$clas,$descripcion,$fecha,$hora,$idpaciente,$idmedico){

            mysqli_report(MYSQLI_REPORT_STRICT);

            try{
                $this->con->getCon()->query("call ActualizaConsulta('$id','$clas','$descripcion','$fecha','$hora','$idpaciente','$idmedico');");
                 return $this->con->getCon()->affected_rows;

            } catch(Exception $e){
                 return  "Error al guardar Usuario ( ". mysqli_errno($this->con->getCon()) .") ".
                $e->getMessage();

            }
       }
    }


   /* 
    $p= new Consulta();
echo $resu=$p->actualizarconsulta('2','shfdhd','db','2010-10-11','10:11','1');
   // var_dump($p->eliminarcons('5'));

*/
?>
