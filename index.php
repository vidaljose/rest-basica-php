<?php
require_once('utilidades.php');

if (isset($_GET['url'])) {

    $var = $_GET['url'];

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        //echo"GET";
        http_response_code(200);
        //print_r($var);

        $numero = Intval(preg_replace('/[^0-9]+/', '', $var), 10);

        //print_r($numero);
        switch ($var) {
            case "productos";
                $respuesta = todosLosProductos();
                print_r(json_encode($respuesta));
                http_response_code(200);
                break;
            case "productos/$numero";
                $respuesta = productoPorID($numero);
                print_r(json_encode($respuesta));
                http_response_code(200);

            default;
        }
    } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $postBody = file_get_contents("php://input"); //aqui trae la informacion del post
        //print_r(json_decode($postBody));
        $convertir = json_decode($postBody,true);
        if(json_last_error() == 0){
            
            //print_r($convertir);
            http_response_code(200);


            switch ($var) {
                case "productos";
                    //$respuesta = todosLosProductos();
                    crearProducto($convertir);
                    http_response_code(200);
                    break;
               
    
                default;
            }

        }else{
            http_response_code(400);

        }
    } else {
        http_response_code(405);
    }
}else{
    //meta data
    
}
