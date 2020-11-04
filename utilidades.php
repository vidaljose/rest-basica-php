<?php
require_once("db2.php");

function todosLosProductos(){
    $query = "SELECT * FROM productos";
    $respuesta = obtenerRegistros($query);
    return convertirUTF($respuesta);
}

function productoPorID($id){
    $query = "SELECT * FROM productos WHERE ProductoId = $id";
    $respuesta = obtenerRegistros($query);
    return convertirUTF($respuesta);
}

function crearProducto($array){
    $codigo = $array[0]['Codigo'];
    $nombre = $array[0]['Nombre'];
    $presentacio = $array[0]['Presentacion'];

    $query = "INSERT INTO productos(Codigo,Nombre,Presentacion) VALUES ($codigo,$nombre,$presentacio)";
    obtenerRegistro($query);
    return true;
}

?>