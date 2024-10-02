<?php
session_start();
//print_r($_REQUEST);

if (isset($_POST["submit"]) && !empty($_POST['id']) && !empty($_POST['senha'])) {

    include_once('bancoConfig.php');
    $id = $_POST['id'];
    $senha = $_POST['senha'];

   // print_r($id);
    //print_r('<br>');
    //print_r($senha);

    $sql = "SELECT * FROM funcionario WHERE idFuncionario = '$id' AND SenhaFuncionario = '$senha'";
    $result = $conexao ->query($sql);

    print_r($result);

    if(mysqli_num_rows($result) < 1) {

        unset($_SESSION ['id']);
        unset($_SESSION ['senha']);
        header("Location: bancoEntrada.php");
    } 
    else {
        $_SESSION ['id'] = $id;
        $_SESSION ['senha'] = $senha; 
        header("Location: bancoDash.php");
    }

} 
else{
    header("Location: bancoEntrada.php");
    }

    
?>