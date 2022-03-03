<?php

    function alertErro($msg)
    {
        echo '<div class="alert alert-danger" role="alert">';
            echo $msg;
        echo '</div>';   
    }
    function alertSucesso($msg)
    {
        echo '<div class="alert alert-success" role="alert">';
        echo $msg;
        echo '</div>';
    }
    function btEncerrar()
    {
        echo '<div class="row justify-content-center">
        <a href="lista_dadosFormsPj.php" class="btn btn-primary text-center ml-3">Ver Dados</a>
        <a href="index.php" class="btn btn-primary text-center ml-3">Cadastrar</a>
        </div>';
    }

    function login()
    {
        session_start();
       
        include "conexaoForms.php";

        if(isset($_POST['submit_login'])) {

            $_SESSION['email'] = $_POST['email'];
            $_SESSION['senha'] = $_POST['senha'];

            if(empty($_SESSION['email']) || empty($_SESSION['senha'])) {
                $_SESSION['erro'] = "Campos usuário ou senha não preenchido";
                header('Location: loginforms.php');
            }
        }
        $query = "SELECT nome FROM usuario WHERE email = '$email' AND senha = sha1('".$senha."')";
        echo $query;
        $resultado = $con->query($query);
        if(!($resultado->num_rows == 1)){
            header("Location: loginforms.php");
            exit();
        }

    }
?> 