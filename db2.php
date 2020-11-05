<?php
    class Conexion {
        protected $server;
        protected $user;
        protected $pswd;
        protected $database;
        protected $port ;
        
        function __construct($server,$user,$pswd,$database,$port){
            $this->server = $server;
            $this->user = $user;
            $this->pswd = $pswd;
            $this->database = $database;
            $this->port = $port;  
        }
        //Guardar modificar eliminar
        function obtenerRegistro($sqlstr,$conexion = null){
            $conexion = new mysqli($this->server,$this->user,$this->pswd,$this->database,$this->port);
            
            if($conexion->connect_errno){
                die($conexion->connect_error);
            }
            if(!$conexion ){
                global $conexion;
            } 

            if ($conexion->query($sqlstr) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sqlstr . "<br>" . $conexion->error;
            }

            return $conexion -> affected_rows;
        } 
        

        //select
        function obtenerRegistros($sqlstr,$conexion = null){
            $conexion = new mysqli($this->server,$this->user,$this->pswd,$this->database,$this->port);
            if(!$conexion ){
                global $conexion;
            } 
            $result = $conexion->query($sqlstr);
            $resultArray = array();
            foreach($result as $registros){
                $resultArray[]= $registros;
            }

            return $resultArray;
        }

        //utf-8
        function convertirUTF($array){
            array_walk_recursive($array,function(&$item,$key){
                if(!mb_detect_encoding($item,'utf-8',true)){
                    $item = utf8_encode($item);
                }
            });
            return $array;
        }

    }
    
    

?>