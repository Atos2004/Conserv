<?php
    if (!empty($_GET["id"])){
    

    include_once('config.php');

        $idprod = $_GET['id'];

        $sqlSelect = "SELECT * FROM produto WHERE idproduto= $idprod";
        $result = $conexao ->query($sqlSelect);

            if($result -> num_rows > 0){

                while($user_data = mysqli_fetch_assoc($result)) {

                    $marca = ($user_data['marca']);
                    $valorProduto= ($user_data['valorProduto']);
                    $quantidade = ($user_data['quantidade']);
    
                }
            }
            else{
                header('Location: bancoProdutos.php');
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    
    <!--Link CSS-->
    <link rel="stylesheet" href="CSS/editProdutos.css">

</head>
<body> 
    <div class="box">
        <form action="saveEditProd.php" method="POST">
            
            <fieldset>
                <legend><b>Produto</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="marca" id="marca" class="inputUser" value="<?php echo $marca?>" required>
                    <label for="marca" class="labelInput">Marca do Produto</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="valorProduto" id="valorProduto" class="inputUser" value="<?php echo $valorProduto?>" required>
                    <label for="valorProduto" class="labelInput">Valor do Produto</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="quantidade" id="quantidade" class="inputUser" value="<?php echo $quantidade?>" required>
                    <label for="quantidade" class="labelInput">Quantidade</label>
                </div>
                <br><br>
                <input type="hidden" name="id" value="<?php echo $idprod?>">
                <input type="submit" name="update" id="update" >
                
            </fieldset>
                <br><br>
        </form>
    </div>
</body>
</html>