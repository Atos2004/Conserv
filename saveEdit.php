<?php

include_once("config.php");

if(isset($_POST["update"])){

        $id = $_POST["id"];
        $NomeCliente = ($_POST['Nome']);
        $Telefone = ($_POST['Telefone']);
        $cidade = ($_POST['cidade']);
        $bairro = ($_POST['bairro']);
        $Endereco = ($_POST['Endereco']);

        $sqlUpdate = "UPDATE cliente SET NomeCliente = '$NomeCliente', Telefone = '$Telefone', cidade = '$cidade',
        bairro = '$bairro', Endereco = '$Endereco'
        WHERE ID_Cliente = '$id'";

        $result = $conexao->query($sqlUpdate);
        }
        header("Location: dadosEnviados.php");

?>