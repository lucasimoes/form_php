<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>SA</title>
</head>
<style>
    .design{
        box-shadow: rgba(0, 0, 0, 0.15) 0px 0px 50px;
        border-radius: 3px;
    }
</style>
<body>

<?php
require_once "conexaoForms.php";
    if (isset($_POST['salvar'])) {
        
        $nome = $_POST['nome'];
        $logradouro = $_POST['logradouro'];
        $cpf = $_POST['cpf'];
        $dtnascimento = $_POST['dt_nascimento'];
        $email = $_POST['email'];
        $cep = $_POST['cep'];
        $bairro = $_POST['bairro'];
        $complemento = $_POST['complemento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $telefone = $_POST['telefone'];
        

    
            $InserirResult ="INSERT INTO clientepf (nome, logradouro, cpf, dt_nascimento, email, cep, bairro, complemento, cidade, estado, telefone) "
            . "VALUES ('$nome', '$logradouro', '$cpf', '$dtnascimento', '$email','$cep', '$bairro', '$complemento', '$cidade', '$estado', '$telefone')";

        $sql = mysqli_query($con, "$InserirResult");

        if ($sql == '') {
            echo '<script>alert("Erro ao inserir dados.");</script>';
        } else {

            header('Location: lista_dadosFormsPf.php');
        }
       
        
    }
?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4 text-center">Vanloo</h1>
            <p class="lead text-center">Cadastro Pessoa Fisica</p>
        </div>
    </div>
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <form action="#" method="post" class="design p-5 mt-5 mb-5 text-center">
                    <div class="form-group">
                        <label for="">CPF</label>
                        <input type="text" class="form-control" name="cpf">
                    </div>
                    <div class="form-group" style="width:18em;">
                        <label for="Name">Nome</label>
                        <input type="text" class="form-control" name="nome">
                    </div>
                    <div class="form-group">
                        <label for="logradouro">Logradouro</label>
                        <input type="text" class="form-control" name="logradouro">
                    </div>
                    
                    <div class="form-group">
                        <label for="data">Data de Nascimento</label>
                        <input type="date" class="form-control" name="dt_nascimento">
                    </div>
                    <div class="form-group">
                        <label for="Email">E-mail</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="Telefone">Telefone</label>
                        <input type="text" class="form-control" name="telefone">
                    </div>
                    <div class="form-group">
                        <label for="cep">CEP</label>
                        <input type="text" class="form-control" name="cep">
                    </div>
                    <div class="form-group">
                        <label for="bairro">Bairro</label>
                        <input type="text" class="form-control" name="bairro">
                    </div>
                    <div class="form-group">
                        <label for="complemento">Complemento</label>
                        <input type="text" class="form-control" name="complemento">
                    </div>
                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" name="cidade">
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" name="estado">
                    </div>
                    <div class="form-group">

                    </div>
                    <input type="submit" name="limpa_tudo" value="Limpar" class="btn btn-warning">
                    <input type="submit" name="salvar" value="Enviar" class="btn btn-primary">
                </form>
            </div>
        </div>
    </main>
</body>
</html>