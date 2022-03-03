<?php
    require_once "conexaoForms.php";
    $array_erro = [];
    empty($_POST['razao_social']) ? $array_erro['razao_social'] = "Campo Razão Social não preenchido" : $razao_social = trim($_POST['razao_social']);
    empty($_POST['nome_fantasia']) ? $array_erro['nome_fantasia'] = "Campo Nome Fantasia não preenchido" : $nome_fantasia = trim($_POST['nome_fantasia']);
    empty($_POST['cnpj']) ? $array_erro['cnpj'] = "Campo CNPJ não preenchido" : $cnpj = trim($_POST['cnpj']);
    empty($_POST['cep']) ? $array_erro['cep'] = "Campo CEP não preenchido" : $cep = trim($_POST['cep']);
    empty($_POST['logradouro']) ? $array_erro['logradouro'] = "Campo Logradouro não preenchido" : $logradouro = trim($_POST['logradouro']);
    empty($_POST['bairro']) ? $array_erro['bairro'] = "Campo Bairro não preenchido" : $bairro = trim($_POST['bairro']);
    empty($_POST['cidade']) ? $array_erro['cidade'] = "Campo Cidade não preenchido" : $cidade = trim($_POST['cidade']);
    empty($_POST['estado']) ? $array_erro['estado'] = "Campo Estado não preenchido" : $estado = trim($_POST['estado']);
    empty($_POST['telefone']) ? $array_erro['telefone'] = "Campo Telefone não preenchido" : $telefone = trim($_POST['telefone']);
    empty($_POST['email']) ? $array_erro['email'] = "Campo E-mail não preenchido" : $email = trim($_POST['email']);
    if (count($array_erro) > 0) {
        foreach ($array_erro as $value) {
            alertErro($value);
            echo '<br>';
        }
    } else {
        $query = "INSERT INTO clientepj values(NULL, '$razao_social', '$nome_fantasia', '$cnpj', '$inscricao_estadual', '$cep', '$logradouro', '$bairro', '$cidade', '$estado', '$telefone', '$email' NOW())";
        $resultado = $con->query($query);
        if($resultado){
            alertSucesso('Dados informados com sucesso!');
            
            unset($razao_social, $nome_fantasia, $cnpj, $inscricao_estadual, $cep, $logradouro, $bairro, $cidade, $estado,  $telefone, $email);
            $con->close();
        }else{
            alertErro('Não foi possível inserir os dados!');
        }
        
   
    }