<?php
    if (isset($_POST['submit'])){
    

    include_once('config.php');

    $marca = ($_POST['marca']);
    $valorProduto = ($_POST['valorProduto']);
    $quantidade = ($_POST['quantidade']);
    
    

    $result = mysqli_query($conexao, "INSERT INTO produto (marca,valorProduto,quantidade)
    VALUES ('$marca', '$valorProduto', '$quantidade')");

   // header("Location: dadosEnviadosServ.php");//
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços </title>
    
    <link rel="stylesheet" href="CSS/addProdutos.css">

</head>
<body> 
    <div class="box">
        <form action="addProdutos.php" method="POST">
            
            <fieldset>
                <legend><b>Produto</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="marca" id="marca" class="inputUser" required>
                    <label for="marca" class="labelInput">Marca do Produto</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="valorProduto" id="valorProduto" class="inputUser" required>
                    <label for="valorProduto" class="labelInput">Valor do Produto</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="quantidade" id="quantidade" class="inputUser" required>
                    <label for="quantidade" class="labelInput">Quantidade</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit" >
            </fieldset>
        </form>
    </div>
</body>
</html>