<?php
    ///////////////////////Direccion de Servicios(Server)//////////////////////////
    require_once "lib/nusoap.php";
    $cliente = new nusoap_client("http://localhost/SW/Practica4BVB/Server.php");

    $error =$cliente->getError();
    if($error){
        echo "<h2>Constructor Error</h2><pre>".$error."</pre>";
    }
    ///////////////////////Consumo de Servicios//////////////////////////
    $resultado=$cliente->call("getFrutas", array("datos"=>"Frutas"));
    if($cliente->fault){
        echo "<h2>Fault</h2><pre>";
        print_r ($resultado);
        echo "</pre>";
    }
    else {
        $error=$cliente->getError();
        if($error){
            echo"<h2>Error</h2><pre>".$error."</pre>";
        }
        else {
            echo "<h2>FRUTAS</h2><pre>";
            echo $resultado.".";
            echo "</pre>";
        }
    }
?>