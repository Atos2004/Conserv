<?php

include_once("config.php");

if(isset($_POST["update"])){

        $idprod = $_POST["id"];
        $marca = ($_POST['marca']);
        $valorProduto = ($_POST['valorProduto']);
        $quantidade = ($_POST['quantidade']);
       

        $sqlUpdate = "UPDATE produto SET marca = '$marca', valorProduto = '$valorProduto', 
        quantidade = '$quantidade'
        
        WHERE idproduto = '$idprod'";

        $result = $conexao->query($sqlUpdate);

        echo $result;
        
        header("Location: dadosEnviadosProd.php");
        }
        

?>