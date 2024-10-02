<?php
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbpass = 'chimbinha';
    $dbName = 'lavagempro';

    $conexao = new mysqli($dbHost, $dbUsername,  $dbpass, $dbName);

   // if ($conexao->connect_error) {
       //echo'ERRO... Por algum motivo, os dados não foram enviados. Tente novamente ou fale conosco no whatsapp';
   // }
   // header('location: Dadosenviados.php');

    

?>