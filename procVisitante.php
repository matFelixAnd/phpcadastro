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

    
    
    $result_visitante = "INSERT INTO psq_vis  (idvis, rg ,nome, sobrenome, descricao, created) VALUES('$id','$rg','$nome', '$sobrenome','$descricao', NOW() ) ";
     
    $resultado_visitante = mysqli_query($mysqli, $result_visitante);
    
    if(mysqli_insert_id($mysqli)){
        $_SESSION['msg'] = "<p style='color:green; font-size: 32px;'>Nova visita registrada</p>";
        header("Location: index.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red; font-size: 32px;'>Erro ao registrar visita</p>";
        header("Location: index.php");
    }
    
?>


