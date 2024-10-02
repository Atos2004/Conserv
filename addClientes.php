<?php
    if (isset($_POST['submit'])){
       

        include_once('config.php');

        $NomeCliente = ($_POST['Nome']);
        $Telefone = ($_POST['Telefone']);
        $cidade = ($_POST['cidade']);
        $bairro = ($_POST['bairro']);
        $Endereco = ($_POST['Endereco']);

        $result = mysqli_query($conexao, "INSERT INTO cliente (NomeCliente,Telefone,cidade,bairro,Endereco)
         VALUES ('$NomeCliente', '$Telefone', '$cidade', '$bairro', '$Endereco')");

        header("Location: dadosEnviados.php");
    }
   
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | Conserv </title>
    
    <!--Link CSS-->
    <link rel="stylesheet" href="CSS/addClientes.css">

</head>
<body> 
   
    <div class="box">
        <form action="addClientes.php" method="POST">
            
            <fieldset>
                <legend><b>Preencha o Formulário</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="Nome" id="Nome" class="inputUser" required>
                    <label for="Nome" class="labelInput">Nome Completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="Telefone" id="Telefone" class="inputUser" required>
                    <label for="Telefone" class="labelInput">Telefone</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="bairro" id="bairro" class="inputUser" required>
                    <label for="bairro" class="labelInput">Bairro</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="Endereco" id="Endereco" class="inputUser" required>
                    <label for="Endereco" class="labelInput">Endereço</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit" >
            </fieldset>
        </form>
    </div>
</body>
</html>