<?php
session_start();
include_once("conexao.php");
include_once("header.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_visitante= "SELECT * FROM cad_vis WHERE id = '{$id}'";
$resultado_visitante=mysqli_query($mysqli, $result_visitante);
$row_visitante = mysqli_fetch_assoc($resultado_visitante);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/edita.css">    
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/index.css">    
    <title>Editar Cadastro</title>
</head>    
    <header class="container">
        <h1 class="logotipo">  <a href="index.php"> <img src="img/logo.png" alt="Otimotex" > </a> </h1>

    

    <?php 
    if(isset($_SESSION['msg']))
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
        ?>
    </header>
    <?php
?>


<div class="contact-us">
    <h2 class="titulo-editar">Atualizar visita</h2>
  <form method="POST" action="procVisitante.php" enctype="multipart/form-data">
  <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row_visitante['id']; ?>">

    <input name="rg" id="rg" placeholder="Digite o RG" required type="text" readonly  value="<?php echo $row_visitante['rg']; ?> "/>

    <input name="nome" id="nome" placeholder="Nome" required="" type="hidden"  readonly  value="<?php echo $row_visitante['nome']; ?>"/>

    <input name="sobrenome" id="sobrenome" placeholder="Sobrenome" required="" readonly type="hidden" value="<?php echo $row_visitante['sobrenome']; ?>" />

    <input name="email" id="sobrenome" placeholder="Email" type="hidden" disabled value="<?php echo $row_visitante['email']; ?>"/>

    <input name="telefone" id="telefone"  disabled pattern="^\(?\d{2}\)?[\s-]?[\s9]?\d{4}-?\d{4}$" placeholder="Telefone" type="hidden" value="<?php echo $row_visitante['telefone']; ?>" />

    <textarea class="comentario" name="descricao" id="descricao" value="<?php echo $row_visitante['descricao']; ?>" ></textarea>

    <button type="submit" class="btn-editar">Editar</button>
  </form>
</div>




</html>