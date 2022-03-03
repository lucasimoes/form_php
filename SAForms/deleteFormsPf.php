<?php
    require_once "cabecalhoForms.php";
    require_once "conexaoForms.php";
    require_once "funcoesforms.php";
?>
<main class = "shadow-lg py-3 px-md-5 mb-5 bg-white text-dark rounded border">

<?php


$id = '';
  if(isset($_POST['submit'])){
      $query = "DELETE FROM clientepf WHERE id_cliente = {$_GET['id_cliente']}";

      $resultado = $con->query($query);
      if($resultado){
          alertErro("Deletado com sucesso!");
      }else{
          alertErro("Houve um erro");
      }
  }

  $query = "SELECT * FROM clientepf WHERE id_cliente = {$_GET['id_cliente']}";
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
      <th scope="col">Bairro</th>
      <th scope="col">Complemento</th>
      <th scope="col">Cidade</th>
      <th scope="col">Estado</th>
      <th scope="col">Telefone</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($resultado as $value) {?>
    <tr>
      <th scope="row"><?= $value['id_cliente'] ?></th>
      <td><?= $value['nome'] ?></td>
      <td><?= $value['cpf'] ?></td>
      <td><?= $value['dt_nascimento'] ?></td>
      <td><?= $value['cep'] ?></td>
      <td><?= $value['logradouro'] ?></td>
      <td><?= $value['bairro'] ?></td>
      <td><?= $value['complemento'] ?></td>
      <td><?= $value['cidade'] ?></td>
      <td><?= $value['estado'] ?></td>
      <td><?= $value['telefone'] ?></td>
      
    </tr>
    <?php } ?>
    
  </tbody>
</table>

<form action="#" method="post">
    <input type="hidden" name="id_cliente" value="<?= $id?>">
    <div class="form-row">
        <input type="submit" name="submit" class="btn btn-danger text-center" value="Excluir">
    </div>
</form>
<?php
    require_once "rodapeForms.php";
?>