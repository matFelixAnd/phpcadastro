<?php
include_once("conexao.php");

function retorna($rg, $mysqli){
	$result_visita = "SELECT * FROM cad_vis WHERE rg = '$rg' LIMIT 1";
	$resultado_visita = mysqli_query($mysqli, $result_visita);
	if($resultado_visita->num_rows){
		$row_visita = mysqli_fetch_assoc($resultado_visita);
		$valores['nome'] = $row_visita['nome'];
		$valores['nome'] = 'Visitante já cadastrado';
		$valores['sobrenome'] = 'Visitante já cadastrado';
        $valores['email'] = 'Visitante já cadastrado';
        $valores['telefone'] = 'Visitante já cadastrado';
	}else{
		
	}
	return json_encode($valores);
}

if(isset($_GET['rg'])){
	echo retorna($_GET['rg'], $mysqli);
}
?>