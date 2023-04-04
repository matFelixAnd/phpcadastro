<?php
session_start();
include_once("conexao.php");



    include_once("conexao.php");
    
    $id        = filter_input(INPUT_POST,'id');
    $rg        = filter_input(INPUT_POST,'rg');
    $nome      = filter_input(INPUT_POST,'nome');
    $sobrenome = filter_input(INPUT_POST,'sobrenome');
    $email     = filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);
    $telefone  = filter_input(INPUT_POST,'telefone');
    $descricao = filter_input(INPUT_POST,'descricao');

    
    
    $result_visitante = "UPDATE cad_vis SET id='{$id}',rg='{$rg}' ,nome='{$nome}', sobrenome='{$sobrenome}', email='{$email}',telefone='{$telefone}', modified= NOW() WHERE id = '{$id}'";
     
    $resultado_visitante = mysqli_query($mysqli, $result_visitante);
    
    if(mysqli_affected_rows($mysqli)){
        $_SESSION['msg'] = "<p style='color:green; font-size: 32px;'>Dados atualizados com sucesso</p>";
        header("Location: index.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red; font-size: 32px;'>Erro ao atualizar dados</p>";
        header("Location: index.php");
    }
    
?>


