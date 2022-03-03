<main class="shadow-lg py-3 px-md-5 mb-5 bg-white text-dark rounded border">
    <?php
    $flag = 1;
    if (isset($_POST['submit']) || isset($_POST['alterar']))
        require_once "resultado.php";
    elseif ($_GET['id']) {
        require_once "selecionar_dados.php";
    }
    ?>
    <form action="#" method="post">
        <div class="form-row">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <div class="form-group col-md-8">
                <label for="nome">Nome</label>
                <input type="text" class="form-control <?= $array_erro['nome'] ? 'is-invalid' : '' ?>" name="nome" id="nome" value="<?= isset($nome) ? $nome : '' ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control <?= $array_erro['email'] ? 'is-invalid' : '' ?>" id="email" value="<?= isset($email) ? $email : '' ?>">
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="dtnascimento">Data de Nascimento</label>
                <input type="date" class="form-control <?= $array_erro['dtnascimento'] ? 'is-invalid' : '' ?>" name="dtnascimento" id="dtnascimento" value="<?= isset($dtnascimento) ? $dtnascimento : '' ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="salario">Salário</label>
                <input type="text" name="salario" class="form-control <?= $array_erro['salario'] ? 'is-invalid' : '' ?>" placeholder="0000,00" id="salario" value="<?= isset($salario) ? floatval(str_replace(',', '.', $salario)) : '' ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="modalidades">Modalidades</label>
                <input type="number" name="modalidades" class="form-control <?= $array_erro['modalidades'] ? 'is-invalid' : '' ?>" id="modalidades" value="<?= isset($modalidades) ? $modalidades : '' ?>">
            </div>

        </div>
        <div class="form-row justify-content-center">
            <?php if ($flag) : ?>
                <input type="submit" name="submit" class="btn btn-primary text-center" value="Enviar">
            <?php else : ?>
                <input type="submit" name="alterar" class="btn btn-primary text-center" value="Alterar">
            <?php endif ?>
            <a href="lista_dados.php" class="btn btn-primary text-center ml-3">Ver dados</a>
        </div>



    </form>

</main>