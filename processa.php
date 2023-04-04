<?php
session_start();
include_once("conexao.php");

    if(isset($_FILES['arquivo'])) {
        $arquivo = $_FILES['arquivo'];
    
        if($arquivo['error'])
            die("falha ao enviar arquivo");
    
        if($arquivo['size'] > 3000000)
            die("Arquivo muito grande MAX:2.5mb"); 
    
    
    $rg        = filter_input(INPUT_POST,'rg');
    $nome      = filter_input(INPUT_POST,'nome');
    $sobrenome = filter_input(INPUT_POST,'sobrenome');
    $email     = filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);
    $telefone  = filter_input(INPUT_POST,'telefone');
    $descricao = filter_input(INPUT_POST,'descricao');

            $pasta     = "arquivos/";
            $nomeDoArquivo     = $arquivo['name'];
            $novoNomeDoArquivo = uniqid();
            $extensao  = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION)); 
    
                if($extensao != "jpg" && $extensao != 'png' && $extensao != "jpeg")
                    die("Tipo de arquivo não aceito");
    
            $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
            $deu_certo = move_uploaded_file($arquivo["tmp_name"], $pasta . $novoNomeDoArquivo . "." . $extensao);

    
            $result_visitante = $mysqli->query("SELECT COUNT(*) FROM cad_vis WHERE rg = '{$rg}'");
            $row = $result_visitante->fetch_row();
            if ($row[0] > 0) {
            } else {
                $mysqli->query("INSERT INTO cad_vis (rg, nome,sobrenome, email,telefone, descricao, nomeFT, caminhoFT,  created) VALUES('$rg','$nome','$sobrenome','$email' , '$telefone','$descricao','$novoNomeDoArquivo', '$path',   NOW() )");
            }
    $resultado_visitante = mysqli_query($mysqli, $result_visitante);
    
    if(mysqli_insert_id($mysqli)){
        $_SESSION['msg'] = "<p style='color:green; font-size: 32px;'>Usuário cadastrado com sucesso</p>";
        header("Location: index.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red; font-size: 32px;'>Usuário não foi cadastrado com sucesso, verifique se já está cadastrado ou se os dados informados estão corretos.</p>";
        header("Location: index.php");
    }
    }

?>


