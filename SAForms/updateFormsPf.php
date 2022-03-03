<?php
require_once "cabecalhoForms.php";
require_once "conexaoForms.php";
require_once "funcoesforms.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
<style>
    .design{
        box-shadow: rgba(0, 0, 0, 0.15) 0px 0px 50px;
        border-radius: 3px;
    }
</style>
<main class="shadow-lg py-3 px-md-5 mb-5 bg-white text-dark rounded border">

    <?php

    if (isset($_POST['alterar'])) {
        $id_cliente = $_GET['id'];
        $nome = trim($_POST['nome']);
        $logradouro = trim($_POST['logradouro']);
        $cpf = trim($_POST['cpf']);
        $dtnascimento = trim($_POST['dt_nascimento']);
        $email = trim($_POST['email']);
        $cep = trim($_POST['cep']);
        $bairro = trim($_POST['bairro']);
        $complemento = trim($_POST['complemento']);
        $cidade = trim($_POST['cidade']);
        $estado = trim($_POST['estado']);
        $telefone = trim($_POST['telefone']);

        $query = "UPDATE clientepf SET nome='$nome', logradouro = '$logradouro',
    cpf='$cpf', dt_nascimento='$dtnascimento', bairro='$bairro', cidade='$cidade', 
    estado='$estado', email='$email', telefone='$telefone', complemento='$complemento' WHERE id_cliente = $id_cliente";

        $resultado = $con->query($query);

        if ($resultado) {
            alertErro("Alterado com sucesso!");
        } else {
            alertErro("Houve um erro");
        }
    }

    ?>

    <?php

    $query = "SELECT * FROM clientepf";
    $resultado = $con->query($query);

    ?>
    <div class="container">
            <div class="row justify-content-center">
    <?php foreach ($resultado as $value)  ?>
        <form action="#" method="post" class="design p-5 mt-5 mb-5 text-center" style="width: 25rem;">

            <div class="form-group">
                <label for="">CPF</label>
                <input type="text" class="form-control" name="cpf" value="<?= $value['cpf'] ?>">
            </div>
            <div class="form-group">
                <label for="Name">Nome</label>
                <input type="text" class="form-control" name="nome" value="<?= $value['nome'] ?>">
            </div>
            <div class="form-group">
                <label for="logradouro">Logradouro</label>
                <input type="text" class="form-control" name="logradouro" value="<?= $value['logradouro'] ?>">
            </div>

            <div class="form-group">
                <label for="data">Data de Nascimento</label>
                <input type="date" class="form-control" name="dt_nascimento" value="<?= $value['dt_nascimento']?>">
            </div>
            <div class="form-group">
                <label for="Email">E-mail</label>
                <input type="email" class="form-control" name="email" value="<?= $value['email'] ?>">
            </div>
            <div class="form-group">
                <label for="Telefone">Telefone</label>
                <input type="text" class="form-control" name="telefone" value="<?= $value['telefone'] ?>">
            </div>
            <div class="form-group">
                <label for="cep">CEP</label>
                <input type="text" class="form-control" name="cep" value="<?= $value['cep'] ?>">
            </div>
            <div class="form-group">
                <label for="bairro">Bairro</label>
                <input type="text" class="form-control" name="bairro" value="<?= $value['bairro'] ?>">
            </div>
            <div class="form-group">
                <label for="complemento">Complemento</label>
                <input type="text" class="form-control" name="complemento" value="<?= $value['complemento'] ?>">
            </div>
            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" name="cidade" value="<?= $value['cidade'] ?>">
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <input type="text" class="form-control" name="estado" value="<?= $value['estado'] ?>">
            </div>

            <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">

        </form>
        </div>
    </div>


    <?php
    require_once "rodapeForms.php";
    ?>
</body>
</html>
