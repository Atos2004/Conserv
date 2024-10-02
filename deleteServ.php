<?php

if (!empty($_GET["id"])) {
       

    include_once('config.php');

    $idserv = $_GET['id'];

    $sqlSelect = "SELECT * FROM servico WHERE id_servico = $idserv";
    $result = $conexao ->query($sqlSelect);

    if($result -> num_rows > 0){

        $sqlDelete = "DELETE FROM servico WHERE id_servico = $idserv";
        $resultDelete = $conexao ->query($sqlDelete);

        }
    }
    header('Location: bancoServicos.php');
    

?>