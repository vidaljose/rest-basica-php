<?php
    $server = "localhost";
    $user = "root";
    $pswd = "";
    $database= "db_almacenes";
    $port = "3306";
    
    // conexion
    $conexion = new mysqli($server,$user,$pswd,$database,$port);
    if($conexion->connect_errno){
        die($conexion->connect_error);
    }

    //Guardar modificar eliminar
    function obtenerRegistro($sqlstr,$conexion = null){
        if(!$conexion ){
            global $conexion;
        } 

        $result = $conexion->query($sqlstr);
        return $conexion -> affected_rows;
    } 
    

    //select
    function obtenerRegistros($sqlstr,$conexion = null){
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


?>