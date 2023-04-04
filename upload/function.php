<?php
include_once("conexao.php");

function retorna($rg, $mysqli){
	$result_visitante = "SELECT nome,sobrenome,email,telefone,descricao FROM cad_vis WHERE rg = '$rg' LIMIT 1";
	$resultado_visitante = mysqli_query($mysqli, $result_visitante);
	if($resultado_visitante->num_rows){
		$row_visitante = mysqli_fetch_assoc($resultado_visitante);
		$valores['nome'] = $row_visitante['nome'];
		$valores['sobrenome'] = $row_visitante['sobrenome'];
        $valores['email'] = $row_visitante['email'];
        $valores['telefone'] = $row_visitante['telefone'];
        $valores['descricao'] = $row_visitante['descricao'];
	}else{
		$valores['rg'] = 'RG não encontrado';
	}
	return json_encode($valores);
}

if(isset($_GET['rg'])){
	echo retorna($_GET['rg'], $mysqli);
}
?>