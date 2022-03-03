<?php
session_start();
require_once "funcoes.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>

    <div class="form-row justify-content-center">
        <main class="shadow-lg py-3 px-md-5 mt-5 mb-5 bg-white text-dark rounded border">


            <?php if (!empty($_SESSION['erro']))
                alertErro($_SESSION['erro']);
            //var_dump($_SESSION);

            ?>
            <div class="form-group justify-content-center">
                <form action="index.php" method="post">
                    <h1 class="text-center">Login</h1>
            </div>

            <div class="form-group justify-content-center">
                <label for="email">E-mail</label>
                <input type="text" class="form-control <?= validaCampoEmBranco($_SESSION['email']) ?>" name="email" id="email" value="<?= retornaValorNoCampo($_SESSION['email']) ?>">
            </div>
            <div class="form-group justify-content-center">
                <label for="senha">Senha</label>
                <input type="password" name="senha" class="form-control <?= validaCampoEmBranco($_SESSION['senha']) ?>" id="senha" value="">
            </div>
            <div class="form-group justify-content-center">
                <input type="submit" name="submit_login" value="Entrar" class="btn btn-primary">
            </div>
            </form>
        </main>
    </div>

</body>

</html>