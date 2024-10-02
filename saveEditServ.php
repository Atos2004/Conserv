<?php

include_once("config.php");

if(isset($_POST["update"])){

        $idserv = $_POST["id"];
        $Tipo = ($_POST['Tipo']);
        $idCliente = ($_POST['idCliente']);
        $Valor = ($_POST['Valor']);
        $Data = ($_POST['DataServ']);
        $Horario = ($_POST['Horario']);
        $StatusServ = ($_POST['StatusServ']);

        $sqlUpdate = "UPDATE servico SET Tipo = '$Tipo', idCliente = '$idCliente', Valor = '$Valor',
        DataServ = '$Data', Horario = '$Horario', StatusServ = '$StatusServ'
        WHERE id_servico = '$idserv'";

        $result = $conexao->query($sqlUpdate);

        echo $result;
        
        header("Location: dadosEnviadosServ.php");
        }
        

?>