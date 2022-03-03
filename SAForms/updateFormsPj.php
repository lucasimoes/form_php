<?php
require_once "cabecalhoForms.php";
require_once "conexaoForms.php";
require_once "funcoesforms.php";

?>
<main class="shadow-lg py-3 px-md-5 mb-5 bg-white text-dark rounded border">

  <?php
  if (isset($_POST['alterar'])) {
    $nome_fantasia = trim($_POST['nome_fantasia']);
    $razao_social = trim($_POST['razao_social']);
    $cep = trim($_POST['cep']);
    $logradouro = trim($_POST['logradouro']);
    $bairro = trim($_POST['bairro']);
    $cidade = trim($_POST['cidade']);
    $estado = trim($_POST['estado']);
    $email = trim($_POST['email']);
    $id_clientepj = $_GET['id_clientepj'];
    $query = "UPDATE clientepj SET nome_fantasia='$nome_fantasia', razao_social = '$razao_social',
    cep='$cep', logradouro='$logradouro', bairro='$bairro', cidade='$cidade', 
    estado='$estado', email='$email' WHERE id_clientepj = $id_clientepj";

    $resultado = $con->query($query);
    
      if ($resultado) {
        alertErro("Alterado com sucesso!");
      } else {
        alertErro("Houve um erro");
      }
      //header('location: lista_dadosFormsPj.php');
  }

  ?>

  <?php

  $query = "SELECT * FROM clientepj";
  $resultado = $con->query($query);
  
  ?>

  <?php foreach ($resultado as $value)  ?>
    <form action="#" method="post" class="design p-5 mt-5 mb-5 text-center">

      <div class="form-group">
        <label for="NomeFantasia">Nome Fantasia</label>
        <input type="text" value="<?= $value['nome_fantasia'] ?>" class="form-control" name="nome_fantasia">
      </div>
      <div class="form-group">
        <label for="RazaoSocial">Razão Social</label>
        <input type="text" value="<?= $value['razao_social'] ?>" class="form-control" name="razao_social">
      </div>
      <div class="form-group">
        <label for="cep">CEP</label>
        <input type="text" value="<?= $value['cep'] ?>" class="form-control" name="cep">
      </div>
      <div class="form-group">
        <label for="logradouro">Logradouro</label>
        <input type="text" value="<?= $value['logradouro'] ?>" class="form-control" name="logradouro">
      </div>
      <div class="form-group">
        <label for="bairro">Bairro</label>
        <input type="text" value="<?= $value['bairro'] ?>" class="form-control" name="bairro">
      </div>
      <div class="form-group">
        <label for="cidade">Cidade</label>
        <input type="text" value="<?= $value['cidade'] ?>" class="form-control" name="cidade">
      </div>
      <div class="form-group">
        <label for="estado">Estado</label>
        <input type="text" value="<?= $value['estado'] ?>" class="form-control" name="estado">
      </div>
      <div class="form-group">
        <label for="Email">E-mail</label>
        <input type="text" value="<?= $value['email'] ?>" class="form-control" name="email">
      </div>

      <input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
      
    </form>

  
  <?php
  require_once "rodapeForms.php";
  ?>