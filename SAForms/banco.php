<?php

$nome_servidor = "localhost";
$nome_banco_dados = "formulario";
$usuario = "root";
$senhaBD = "";

//1Âº passo - Conecta ao servidor MySQL
if (!($con = mysqli_connect($nome_servidor, $usuario, $senhaBD))) {
    echo "<p>Não foi possível estabelecer uma conexão com o gerenciador MySQL. Favor Contactar o Administrador. </p>";
    exit;
}

//2Âº passo - Seleciona o Banco de Dados
mysqli_select_db($con, $nome_banco_dados) or die('Erro ao conectar com a base de dados, Favor contactar o Administrador');
//echo " <p>Não foi possível estabelecer uma conexão com a base de dados. Favor Contactar o Administrador. </p>";
?>