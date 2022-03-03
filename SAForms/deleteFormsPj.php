<?php
    require_once "cabecalhoForms.php";
    require_once "conexaoForms.php";
    require_once "funcoesforms.php";
?>
<main class = "shadow-lg py-3 px-md-5 mb-5 bg-white text-dark rounded border">

<?php
  if(isset($_POST['submit'])){
      $query = "DELETE FROM clientepj WHERE id_clientepj = {$_POST['id_clientepj']}";
      $resultado = $con->query($query);
      if($resultado){
          alertErro("Deletado com sucesso!");
      }else{
          alertErro("Houve um erro");
      }
  }

  $id = '';

  $query = "SELECT * FROM clientepj WHERE id_clientepj = {$_GET['id']}";
  $resultado = $con->query($query);

?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
      <th scope="col">Data de Nascimento</th>
      <th scope="col">CEP</th>
      <th scope="col">Logradouro</th>
      <th scope="col">Numero</th>
      <th scope="col">Bairro</th>
      <th scope="col">Complemento</th>
      <th scope="col">Cidade</th>
      <th scope="col">Estado</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($resultado as $value) {?>
    <tr>

      <?php
      $id = $value['id_clientepj'];
      ?>

      <th scope="row"><?= $value['id_clientepj'] ?></th>
      <td><?= $value['razao_social'] ?></td>
      <td><?= $value['nome_fantasia'] ?></td>
      <td><?= $value['cnpj'] ?></td>
      <td><?= $value['logradouro'] ?></td>
      <td><?= $value['numero'] ?></td>
      <td><?= $value['bairro'] ?></td>
      <td><?= $value['cidade'] ?></td>
      <td><?= $value['estado'] ?></td>
      <td><?= $value['cep'] ?></td>
      <td><?= $value['email'] ?></td>
      <td><a href="deleteFormsPj.php?id_clientepj=<?= $value ['id_clientepj']?>" class="btn btn-danger">Excluir</td>
      
    </tr>
    <?php } ?>
    
  </tbody>
</table>

<form action="#" method="post">
    <input type="hidden" name="id_clientepj" value="<?= $id?>">
    <div class="form-row">
        <input type="submit" name="submit" class="btn btn-danger text-center" value="Excluir">
    </div>
</form>

<?php
  if(isset($_POST['submit']))
  header('location: lista_dadosFormsPj.php');
?>

<?php
    require_once "rodapeForms.php";
?>