<?php
    require_once "cabecalhoForms.php";
    require_once "conexaoForms.php";

?>
<main class = "shadow-lg py-3 px-md-5 mb-5 bg-white text-dark rounded border">

<?php
    
    $query = "SELECT * FROM clientepj";
    $resultado = $con->query($query); 

?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Razao Social</th>
      <th scope="col">Nome Fantasia</th>
      <th scope="col">CNPJ</th>
      <th scope="col">CEP</th>
      <th scope="col">Logradouro</th>
      <th scope="col">Bairro</th>
      <th scope="col">Cidade</th>
      <th scope="col">Estado</th>
      <th scope="col">E-mail</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($resultado as $value) {?>
    <tr>
    <th scope="row"><?= $value['id_clientepj'] ?></th>
      <td><?= $value['razao_social'] ?></td>
      <td><?= $value['nome_fantasia'] ?></td>
      <td><?= $value['cnpj'] ?></td>
      <td><?= $value['cep'] ?></td>
      <td><?= $value['logradouro'] ?></td>
      <td><?= $value['bairro'] ?></td>
      <td><?= $value['cidade'] ?></td>
      <td><?= $value['estado'] ?></td>
      <td><?= $value['email'] ?></td>
      <td><a href="deleteFormsPj.php?id=<?= $value ['id_clientepj']?>" class="btn btn-danger">Excluir</td>
      <td><a href="updateFormsPj.php?id_clientepj=<?= $value ['id_clientepj']?>" class="btn btn-warning">Editar</td>

      
    </tr>
    <?php } ?>

  </tbody>
</table>

<?php
    require_once "rodapeForms.php";
?>