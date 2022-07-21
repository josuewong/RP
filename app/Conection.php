<?php

class Conection{

    private $host;
    private $port;
    private $user;
    private $pass;
    private $bd;
    private $con;

    public function __construct()
    {
        $this->host="localhost";
        $this->port="3306";
        $this->user="root";
        $this->pass="";
        $this->bd="consultorioweb";

        mysqli_report(MYSQLI_REPORT_STRICT);
        try{
            $this-> con=new mysqli($this->host,$this->user,$this->pass,$this->bd,$this->port);

        } catch(Exception $e){
            echo "Error al concetar a la base de datos ( ". mysqli_connect_errno() .") ".
            $e->getMessage();

        }
    }

    public function getCon()
    {
        return $this->con;
    }

    public function __destruct()
    {   mysqli_report(MYSQLI_REPORT_STRICT);
        try{
            $this->con->close();
        } catch(Exception $e) {
        echo "No se ha cerrado la conexión adecuadamente: "+$e->getMessage();
        }
    }



}

?>