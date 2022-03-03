<?php

function alertErro($msg)
{
    echo '<div class="alert alert-danger text-center" role="alert">';
    echo $msg;
    echo '</div>';
}
function alertSucesso($msg)
{
    echo '<div class="alert alert-success text-center" role="alert">';
    echo $msg;
    echo '</div>';
}
function pag_inicial_consulta()
{
    echo '<div class="row justify-content-center">';
    echo '<a href="lista_dados.php" class="btn btn-primary text-center ml-3">Ver dados</a>';
    echo '<a href="index.php" class="btn btn-primary text-center ml-3">Cadastrar</a>';
    echo '</div>';
}
function login()
{

    if (!isset($_SESSION)) session_start();
    //verifica se entrou no index pela tela login ao acionar o botão de "entrar"
    if (isset($_POST['submit_login'])) {

        $_SESSION['email'] = $_POST['email'];
        $_SESSION['senha'] = $_POST['senha'];


        if (empty($_SESSION['email']) || empty($_SESSION['senha'])) {
            $_SESSION['erro'] = "Campos usuário ou senha não preenchido";
            header('Location: login1.php');
            exit();
        }
    }
    //verifica se uma Sessão já foi iniciada, caso digite na URL um caminho válido da aplicação
    //e mesmo com o sistema já fechado o login ainda esteja ativo
    if (!empty($_SESSION)) {
        include "conexao.php";
  
        $sql = "SELECT nome FROM usuario WHERE email='" . $_SESSION['email'] . "' AND senha=SHA('" . $_SESSION['senha'] . "')";

        $result = $con->query($sql);
        //caso seja encontrado um usuário será atribuído um nome a $_SESSION['nome']
        foreach ($result as $value) {
            $_SESSION['nome'] = $value['nome'];
        }
        //será validade se foi encontrado algum usuário no banco esta será a validação
        //chave para entrar ou não na aplicação
        $num_rows = $result->num_rows;

        $con->close();
        if (!$num_rows) {
            $_SESSION['erro'] = "Usuário ou senha inválido!";
            header("Location: login1.php");
            exit();
        }
    } else {
        header("Location: login1.php");
        exit();
    }
}
function validaCampoEmBranco($campo)
{
    if (isset($campo)) {
        if (empty($campo))
            return 'is-invalid';
        else
            return $campo;
    } else
        return '';
}
function retornaValorNoCampo($campo)
{
    if (isset($campo)) {

        return $campo;
    } else
        return '';
}
