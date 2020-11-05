<?php
require_once("db2.php");

function todosLosProductos(){
    $conexion = new Conexion("localhost","root","","db_almacenes","3306");
    $query = "SELECT * FROM productos";
    $respuesta =$conexion->obtenerRegistros($query);
    return $conexion->convertirUTF($respuesta);
}

function productoPorID($id){
    $conexion = new Conexion("localhost","root","","db_almacenes","3306");
    $query = "SELECT * FROM productos WHERE ProductoId = $id";
    $respuesta = $conexion->obtenerRegistros($query);
    
    return $conexion->convertirUTF($respuesta);
}

function crearProducto($array){
    $conexion = new Conexion("localhost","root","","db_almacenes","3306");
    $codigo = $array[0]['Codigo'];
    $nombre = $array[0]['Nombre'];
    $presentacio = $array[0]['Presentacion'];
    $query = "INSERT INTO productos (Codigo,Nombre,Presentacion) VALUES ('$codigo','$nombre','$presentacio');";

    $conexion->obtenerRegistro($query);
    return true;
}

?>