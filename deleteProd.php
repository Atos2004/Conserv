<?php

if (!empty($_GET["id"])) {
       

    include_once('config.php');

    $idprod = $_GET['id'];

    $sqlSelect = "SELECT * FROM produto WHERE idproduto = $idprod";
    $result = $conexao ->query($sqlSelect);

    if($result -> num_rows > 0){

        $sqlDelete = "DELETE FROM produto WHERE idproduto = $idprod";
        $resultDelete = $conexao ->query($sqlDelete);

        }
    }
    header('Location: bancoProdutos.php');
    

?>