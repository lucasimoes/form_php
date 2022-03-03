    <?php
    //echo "var_dump";
    //var_dump($_GET);
     if(isset($_GET['id']))
     $flag = 0;
     else
     $flag = 1;
    include "conexao.php";
    $array_erro = [];
    $id = trim($_POST['id']);
    empty($_POST['nome']) ? $array_erro['nome'] = "Campo nome não preenchido" : $nome = trim($_POST['nome']);
    empty($_POST['email']) ? $array_erro['email'] = "Campo e-mail não preenchido" : $email = trim($_POST['email']);
    empty($_POST['dtnascimento']) ? $array_erro['dtnascimento'] = "Campo data não preenchido" : $dtnascimento = trim($_POST['dtnascimento']);
    empty($_POST['salario']) ? $array_erro['salario'] = "Campo salario não preenchido" : $salario = trim(floatval(str_replace(',', '.', $_POST['salario'])));
    empty($_POST['modalidades']) ? $array_erro['modalidades'] = "Campo modalidades não preenchido" : $modalidades = trim($_POST['modalidades']);
    if (count($array_erro) > 0) {
        // foreach ($array_erro as $value) {
             alertErro('Preencha os campos obrigatórios');
        //     echo '<br>';
        // }
    } else {
        //criamos a query
        
        $query = '';
        if(!$flag){
            
            $query = "UPDATE cliente SET nome = '$nome', email='$email', 
            dtnascimento='$dtnascimento', salario='$salario', modalidades='$modalidades' 
            WHERE id = $id";
            
        }else{
            $query = "INSERT INTO cliente values(NULL, '$nome', '$email',
        '$dtnascimento', '$salario', '$modalidades', NOW())";
           
        }
        //execução da query acontece aqui
        $resultado = $con->query($query);
        if($resultado){
            alertSucesso('Operação realizada com sucesso!');

            unset($nome, $email, $dtnascimento, $salario, $modalidades);
            $con->close();
            pag_inicial_consulta();
            require_once "rodape.php";
            exit();
        }else{
            alertErro('Não foi possível realizar a operação: '.$con->error);
        }
    }



    ?>
