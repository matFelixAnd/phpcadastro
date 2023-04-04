<?php 
session_start();
include_once("conexao.php");
?>



    
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/footer.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <title>Home</title>
</head>


    <?php 
    if(isset($_SESSION['msg']))
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
        ?>
    
    <?php
  
?>

<body>
<script type='text/javascript'>
			$(document).ready(function(){
				$("input[name='rg']").blur(function(){
					var $nome = $("input[name='nome']");
					var $sobrenome = $("input[name='sobrenome']");
                    var $email = $("input[name='email']");
                    var $telefone = $("input[name='telefone']");
					$.getJSON('function.php',{ 
						rg: $( this ).val() 
					},function( json ){
						$nome.val( json.nome );
						$sobrenome.val( json.sobrenome );
                        $email.val( json.email );
                        $telefone.val( json.telefone );
					});
				});
			});
		</script>

<header class="container">
        
    <h1 > <a href="index.php"> <img src="img/logo.PNG" alt="OTIMOTEX" class="logotipo" > </h1>
    <div class="menu-opcoes">
        <ul >
          
            <li><button type="text" class="button-busca" > <a href="buscar.php">  Buscar    </a></button></li>
        </ul>
    </div>
</header>


<div class="contact-us">
  <form method="POST" action="processa.php" enctype="multipart/form-data">

  <h2 class="titulo-cadastrar">Cadastrar Visitante</h2>

    <input name="rg" id="rg" placeholder="Digite o RG" required type="text"/>

    
    <input name="nome" id="nome" placeholder="Nome" required="" type="text" />

    <input name="sobrenome" id="sobrenome" placeholder="Sobrenome" required="" type="text" />

    <input name="email" id="email" placeholder="Email" type="email" />

    <input name="telefone" id="telefone" pattern="^\(?\d{2}\)?[\s-]?[\s9]?\d{4}-?\d{4}$" placeholder="Telefone" type="tel" />

    <textarea class="comentario" name="descricao" id="descricao" ></textarea>

        <img src="img/user.png" alt="selecione-imagem" id="imgPhoto">
            <input type="file" id="flImage" name="arquivo" accept="*/image">

            <p class="texto-foto" ><a href="webcam.php" target="_blank">Clique aqui para tirar a foto. </a></p>

            <script src="js/user.js"></script>

    <button type="submit" class="btn-cadastrar">Cadastrar</button>
  </form>
</div>

<?php include("footer.php") ?>

</body>
</html>