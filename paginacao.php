<?php 
/*Contagem de usuários*/
    $result_pg ="SELECT COUNT(id) as num_result FROM cad_vis";
    $resultado_pg = mysqli_query($mysqli,$result_pg);
    $row_pg = mysqli_fetch_assoc($resultado_pg);
    echo "Quantidade total de registros:  " . $row_pg['num_result'] . "<br>" ; 

    /*Quantidade de Páginas*/
    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pagina );
    
    /*Limitando quantidade de link*/
    $max_link =2;
    echo "<a href='lista.php?pagina=1'>Primeira </a>" ;

    for($pag_ant = $pagina - $max_link; $pag_ant <= $pagina - 1; $pag_ant ++) {
        if($pag_ant >= 1){
        echo "<a href='lista.php?pagina=$pag_ant'>$pag_ant </a>"   ;
    }
    }
    echo "$pagina";

    echo "<a href='lista.php?pagina=$quantidade_pg'>Última</a>"  ;
?>