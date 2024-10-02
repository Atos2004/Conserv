<?php

if (!empty($_GET["id"])) {
       

    include_once('config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM cliente WHERE ID_Cliente= $id";
    $result = $conexao ->query($sqlSelect);

    if($result -> num_rows > 0){

        $sqlDelete = "DELETE FROM cliente WHERE ID_Cliente = $id";
        $resultDelete = $conexao ->query($sqlDelete);

        }
    }
    header('Location: bancoClientes.php');
    

?>