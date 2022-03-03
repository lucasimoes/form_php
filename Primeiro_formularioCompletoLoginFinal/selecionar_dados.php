<?php
    $flag = 0;
    include "conexao.php";
    //construi a query
    $query = "SELECT * FROM cliente WHERE id = {$_GET['id']}";
    //executar a query
    $resultado = $con->query($query);

    if ($resultado->num_rows > 0) {
        foreach ($resultado as $value) {
            foreach ($value as $key => $v) {
                $$key = $v;//$$key($nome) se
            }
        }
    }

    // $i= 'seila';
    // $$i = 5;
    // echo "Teste:";
    // echo $seila;




?>