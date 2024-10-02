<?php
    if (!empty($_GET["id"])) {
       

        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM cliente WHERE ID_Cliente= $id";
        $result = $conexao ->query($sqlSelect);

        if($result -> num_rows > 0){

            while($user_data = mysqli_fetch_assoc($result)) {

                $NomeCliente = ($user_data['NomeCliente']);
                $Telefone = ($user_data['Telefone']);
                $cidade = ($user_data['cidade']);
                $bairro = ($user_data['bairro']);
                $Endereco = ($user_data['Endereco']);

            }
        }
        else{
            header('Location: bancoClientes.php');
        }


    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | Conserv </title>
    
 <!--Link CSS-->
    <link rel="stylesheet" href="CSS/edit.css">

</head>
<body> 
   
    <div class="box">
        <form action="saveEdit.php" method="POST">
            
            <fieldset>
                <legend><b>Preencha o Formulário</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="Nome" id="Nome" class="inputUser" value="<?php echo $NomeCliente?>" required>
                    <label for="Nome" class="labelInput">Nome Completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="Telefone" id="Telefone" class="inputUser" value="<?php echo $Telefone?>" required>
                    <label for="Telefone" class="labelInput">Telefone</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" value="<?php echo $cidade?>"required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="bairro" id="bairro" class="inputUser" value="<?php echo $bairro?>" required>
                    <label for="bairro" class="labelInput">Bairro</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="Endereco" id="Endereco" class="inputUser" value="<?php echo $Endereco?>" required>
                    <label for="Endereco" class="labelInput">Endereço</label>
                </div>
                <br><br>
                <input type="hidden" name="id" value="<?php echo $id?>">
                <input type="submit" name="update" id="update" >
            </fieldset>
        </form>
    </div>
</body>
</html>