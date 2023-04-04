<?php
include('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/busca.css">
    <title>Buscar</title>
</head>

<header class="container">        
    <h1 class="logotipo"> <a href="index.php"> <img src="img/logo.PNG" alt="OTIMOTEX" > </h1>
       
           
        
</header>



<body>
    
    <div class="contact-us">
    <button type="text" class="button-cadastrar"> <a href="index.php">Cadastrar</a></button>
    <h1 class="titulo-lista">Lista de Visitante </h1>
    <form action="">
        <input name="busca" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>" placeholder="Digite o termo de pesquisa (RG)" type="text">
        <button type="submit" class="btn-pesquisar">Pesquisar</button>
    </form>
    <br>
    <table width="600px" border="1">
        <tr>
            <th>RG</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Foto</th>
            <th>Listar</th>
            <th>Atualizar</th>
        </tr>
        <?php
        if (!isset($_GET['busca'])) {
            ?>
        <tr>
            <td colspan="9">Resultado de busca aparecerá aqui.</td>
        </tr>
        <?php
        } else {
            $pesquisa = $mysqli->real_escape_string($_GET['busca']);
            $sql_code = "SELECT * 
                FROM cad_vis 
                WHERE rg LIKE '$pesquisa%' 
                OR nome LIKE '$pesquisa%'";
            $sql_query = $mysqli->query($sql_code) or die("ERRO ao consultar! " . $mysqli->error); 
            
            if ($sql_query->num_rows == 0) {
                ?>
            <tr>
                <td colspan="6">Nenhum resultado encontrado...</td>
            </tr>
            <?php
            } else {
                while($dados = $sql_query->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $dados['rg']; ?></td>
                        <td><?php echo $dados['nome']; ?></td>
                        <td><?php echo $dados['sobrenome']; ?></td>
                        <td><?php echo $dados['email']; ?></td>
                        <td><?php echo $dados['telefone']; ?></td>                         
                        <td><?php echo  "<img src='"         .   $dados['caminhoFT']."'class='foto-lista'     />"; ?></td>  
                        <td><?php echo "<button class='btn-editar'> <a href='listar.php?id="     .     $dados['id'] . "'>Listar</a></button> ";?>                     </td>
                        <td><?php echo "<button class='btn-editar'> <a href='visita.php?id="     .     $dados['id'] . "'>Visita</a></button> ";?>                     </td>
                        <td><?php echo "<button class='btn btn-warning btn-sm me-1'> <a href='edita.php?id="     .     $dados['id'] . "'>Editar</a></button> ";?>                     </td>
                    </tr>
                    <?php
                }
            }
            ?>
        <?php
        } ?>
    </table>
    </div>
</body>
</html>