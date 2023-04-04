
<?php
session_start();
include_once("conexao.php");
include_once("header.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_visitante= "SELECT * FROM psq_vis WHERE idvis = '{$id}'";
$resultado_visitante=mysqli_query($mysqli, $result_visitante);
$row_visitante = mysqli_fetch_assoc($resultado_visitante);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/lista.css">    
    <title>Visitas</title>
</head>    
    <header class="container">
        <h1 class="logotipo">  <a href="index.php"> <img src="img/logo.png" alt="Otimotex" > </a> </h1>
<div class="contact-us">
<h1 class="titulo-lista">Listagem de Visitas </h1>
        <table width="600px" border="1" class="tabela">
        <tr>
            <th>RG</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Descrição</th>
            <th>Data</th>
        </tr>

    <?php 
    if(isset($_SESSION['msg']))
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
        ?>
    </header>
    <?php 
    
    $descricao = "SELECT rg, nome,sobrenome, descricao, created from psq_vis where idvis = '$id' ";
    $resultado_descricao = mysqli_query($mysqli, $descricao);
        if ($resultado_descricao->num_rows == 0) {
        } else {
                while($dados = $resultado_descricao->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $dados['rg']; ?></td>
                        <td><?php echo $dados['nome']; ?></td>
                        <td><?php echo $dados['sobrenome']; ?></td>
                        <td><?php echo $dados['descricao']; ?></td>
                        <td><?php echo $dados['created']; ?></td>
                    </tr>
            
                    <?php
                }
            }
            
?>
</div>

