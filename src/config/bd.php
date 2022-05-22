<?php


class BD {
    private $host="localhost";
    private $user="root";
    private $pass="";
    private $nomBD="proyectoslim";

    public function conexion(){
        $conn = "mysql:host=$this->host;dbname=$this->nomBD";
        $connDB = new PDO($conn, $this->user, $this->pass);
        $connDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($connDB){
            // echo "ok";
        }else{
            echo "fall";
        }
        return $connDB;
    }
}
