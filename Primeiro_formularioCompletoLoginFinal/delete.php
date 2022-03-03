<?php

require_once "funcoes.php";
login();
require_once "cabecalho.php";
include "conexao.php";
?>
<main class="shadow-lg py-3 px-md-5 mb-5 bg-white text-dark rounded border">
  <?php
  if (isset($_POST['submit'])) {
    $query = "DELETE FROM cliente WHERE id={$_POST['id']}";

    $resultado = $con->query($query);
    if ($resultado) {
      alertSucesso("Deletado com sucesso");
      pag_inicial_consulta();
      exit();
    } else {
      alertErro("Houve um problema ao deletar o dado: " . $con->erro);
    }
  } else {
    //construir a query
    $query = "SELECT * FROM cliente where id = {$_GET['id']}";

    //executar a query
    $resultado = $con->query($query);
  }
  ?>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nome</th>
        <th scope="col">E-mail</th>
        <th scope="col">Data de Nascimento</th>
        <th scope="col">Salario</th>
        <th scope="col">Modalidades</th>
        <th scope="col">Data de criação</th>

      </tr>
    </thead>
    <tbody>
      <?php foreach ($resultado as $value) { ?>
        <tr>
          <th scope="row"><?= $value['id'] ?></th>
          <td><?= $value['nome'] ?></td>
          <td><?= $value['email'] ?></td>
          <td><?= $value['dtnascimento'] ?></td>
          <td><?= $value['salario'] ?></td>
          <td><?= $value['modalidades'] ?></td>
          <td><?= $value['data_criacao'] ?></td>

        </tr>
      <?php } ?>

    </tbody>
  </table>
  <form action="#" method="post">
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
    <div class="form-row">
      <input type="submit" name="submit" class="btn btn-danger text-center" value="Deletar">
      <a href="lista_dados.php" class="btn btn-primary">Lista Dados</a>
    </div>
  </form>

</main>
<?php

require_once "rodape.php";

?>