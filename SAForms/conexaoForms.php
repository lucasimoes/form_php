<?php

    $con = new mysqli('localhost', 'root', '', 'formulario');

    if($con->connect_error){
        $msg = "Falha ao conectar: ".$con->connect_error;
        alertErro($msg);
    }

?>          