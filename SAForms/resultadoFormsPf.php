<?php
    require_once "conexaoForms.php";
    $array_erro = [];
    empty($_POST['nome']) ? $array_erro['nome'] = "Campo Nome não preenchido" : $nome = trim($_POST['nome']);
    empty($_POST['cpf']) ? $array_erro['cpf'] = "Campo CPF não preenchido" : $cpf = trim($_POST['cpf']);
    empty($_POST['dt_nascimento']) ? $array_erro['dt_nascimento'] = "Campo Data de nascimento não preenchido" : $dt_nascimento = trim($_POST['dt_nascimento']);
    empty($_POST['cep']) ? $array_erro['cep'] = "Campo CPF não preenchido" : $cep = trim($_POST['cep']);
    empty($_POST['logradouro']) ? $array_erro['logradouro'] = "Campo Logradouro não preenchido" : $logradouro = trim($_POST['logradouro']);
    empty($_POST['bairro']) ? $array_erro['bairro'] = "Campo Bairro não preenchido" : $bairro = trim($_POST['bairro']);
    empty($_POST['complemento']) ? $array_erro['complemento'] = "Campo Complemento não preenchido" : $complemento = trim($_POST['complemento']);
    empty($_POST['cidade']) ? $array_erro['cidade'] = "Campo Cidade não preenchido" : $cidade = trim($_POST['cidade']);
    empty($_POST['estado']) ? $array_erro['estado'] = "Campo Estado não preenchido" : $estado = trim($_POST['estado']);
    empty($_POST['telefone']) ? $array_erro['telefone'] = "Campo Telefone não preenchido" : $telefone = trim($_POST['telefone']);
    if (count($array_erro) > 0) {
        foreach ($array_erro as $value) {
            alertErro($value);
            echo '<br>';
        }
    } else {
        $query = "INSERT INTO clientepf values(NULL, '$nome', '$cpf', '$dt_nascimento', '$cep', '$logradouro', '$bairro', '$complemento', '$cidade', '$estado', '$telefone' NOW())";
        $resultado = $con->query($query);
        if($resultado){
            alertSucesso('Dados informados com sucesso!');
            
            unset($nome, $cpf, $dt_nascimento, $cep, $logradouro, $bairro, $complemento, $cidade, $estado, $telefone);
            $con->close();
        }else{
            alertErro('Não foi possível inserir os dados!');
        }
        
   
    }