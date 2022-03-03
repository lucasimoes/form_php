<?php
include "banco.php";


$formularioFinalizado = "<p>Preencha o campo acima para realizar o cadastro!</p>";

function curlExec($url, $post = NULL, array $header = array()) {

//Inicia o cURL
    $ch = curl_init($url);

//Pede o que retorne o resultado como string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Envia cabeçalhos (Caso tenha)
    if (count($header) > 0) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    }

//Envia post (Caso tenha)
    if ($post !== null) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }

//Ignora certificado SSL
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

//Manda executar a requisição
    $data = curl_exec($ch);

//Fecha a conexão para economizar recursos do servidor
    curl_close($ch);

//Retorna o resultado da requisição

    return $data;
}

if (isset($_POST['Buscar'])) {

    $cnpj = $_POST['CNPJ'];

    $urlComCnpj = curlExec("http://receitaws.com.br/v1/cnpj/$cnpj");

    $obj = json_decode($urlComCnpj);


//busca a data da criação
    $dataCriacao = $obj->data_situacao;
//busca o nome
    $nome = $obj->nome;
//busca o nome
    $fantasia = $obj->fantasia;
//busca o CEP
    $cep = $obj->cep;
//busca o Logradouro
    $logradouro = $obj->logradouro;
//busca o numero
    $numero = $obj->numero;
//busca o bairro
    $bairro = $obj->bairro;
//busca o municipio
    $municipio = $obj->municipio;
//busca o uf
    $uf = $obj->uf;
//busca o email
    $email = $obj->email;



    $formularioFinalizado = ' 
            
                <form action="" method="post" class="design p-5 mt-5 mb-5 text-center">
                    <div class="form-group">
                        <label for="NomeFantasia">Nome Fantasia</label>
                        <input type="text" value="' . $fantasia . '" class="form-control" name="nomefantasia">
                    </div>
                    <div class="form-group">
                        <label for="CNPJ">CNPJ</label>
                        <input type="text" value="' . $cnpj . '" class="form-control" name="cnpj">
                    </div>
                    <div class="form-group">
                        <label for="RazaoSocial">Razão Social</label>
                        <input type="text" value="' . $nome . '" class="form-control" name="razaosocial">
                    </div>
                    <div class="form-group">
                        <label for="cep">CEP</label>
                        <input type="text" value="' . $cep . '" class="form-control" name="cep">
                    </div>
                    <div class="form-group">
                        <label for="logradouro">Logradouro</label>
                        <input type="text" value="' . $logradouro . '" class="form-control" name="logradouro">
                    </div>
                    <div class="form-group">
                        <label for="bairro">Bairro</label>
                        <input type="text" value="' . $bairro . '" class="form-control" name="bairro">
                    </div>
                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input type="text" value="' . $municipio . '" class="form-control" name="cidade">
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <input type="text" value="' . $uf . '" class="form-control" name="estado">
                    </div>
                    <div class="form-group">
                        <label for="data">Data de Criação</label>
                        <input type="text" value="' . $dataCriacao . '" class="form-control" name="dtcriacao">
                    </div>
                    <div class="form-group">
                        <label for="Email">E-mail</label>
                        <input type="text" value="' . $email . '" class="form-control" name="email">
                    </div>
                    
                    
                    <input type="submit" name="limpa_tudo" value="Limpar" class="btn btn-warning">
                    <input type="submit" name="Salvar" value="Salvar" class="btn btn-primary">
                </form>
            </div>';
}




if (isset($_POST['Salvar'])) {
    
    $nomefantasia = $_POST['nomefantasia'];
    $cnpj = $_POST['cnpj'];
    $razaosocial = $_POST['razaosocial'];
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $dtcriacao = $_POST['dtcriacao'];
    $email = $_POST['email'];
    
    
        $InserirResult ="INSERT INTO clientepj (razao_social, nome_fantasia, cnpj, cep, logradouro, bairro, cidade, estado, email) "
        . "VALUES ('$razaosocial', '$nomefantasia', '$cnpj', '$cep', '$logradouro', '$bairro', '$cidade', '$estado', '$email')";

    $sql = mysqli_query($con, "$InserirResult");

    if ($sql == '') {
        echo '<script>alert("Erro ao inserir dados.");</script>';
    } else {

        header('Location: index.php');
    }
    
}
?>

<!DOCTYPE html>
<html lang="pt-br">
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

        <main>
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4 text-center">Vanloo</h1>
                    <p class="lead text-center">Cadastro Pessoa Juridica</p>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="" method="post" class="design p-5 mt-5 mb-5 text-center">
                            <div class="form-group">
                                <label for="CNPJ">CNPJ</label>
                                <input type="text" class="form-control" name="CNPJ">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="Buscar" class="form-control btn btn-primary">Buscar</button>
                            </div>
                        </form>
                    

                    <?php echo $formularioFinalizado; ?>


                </div>
            </div>
        </main>
    </body>
</html>