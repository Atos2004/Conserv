<?php
    if (!empty($_GET["id"])){
    

    include_once('config.php');

        $idserv = $_GET['id'];

        $sqlSelect = "SELECT * FROM servico WHERE id_servico= $idserv";
        $result = $conexao ->query($sqlSelect);

            if($result -> num_rows > 0){

                while($user_data = mysqli_fetch_assoc($result)) {

                    $Tipo = ($user_data['Tipo']);
                    $idCliente= ($user_data['idCliente']);
                    $Valor = ($user_data['Valor']);
                    $Data = ($user_data['Dataserv']);
                    $Horario = ($user_data['Horario']);
                    $StatusServ = ($user_data['StatusServ']);
    
                }
            }
            else{
                header('Location: bancoServicos.php');
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços </title>
    
    <!--Link CSS-->
    <link rel="stylesheet" href="CSS/editServicos.css">

</head>
<body> 
    <div class="box">
        <form action="saveEditServ.php" method="POST">
            
            <fieldset>
                <legend><b>Serviços</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="Tipo" id="Tipo" class="inputUser" value="<?php echo $Tipo?>" required>
                    <label for="Tipo" class="labelInput">Tipo do serviço</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="idCliente" id="idCliente" class="inputUser" value="<?php echo $idCliente?>" required>
                    <label for="idCliente" class="labelInput">ID do cliente</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="Valor" id="Valor" class="inputUser" value="<?php echo $Valor?>" required>
                    <label for="Valor" class="labelInput">Valor</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="date" name="DataServ" id="DataServ" class="inputUser" value="<?php echo $Data?>" required>
                    <label for="DataServ" class="labelInput">Data</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="time" name="Horario" id="Horario" class="inputUser" value="<?php echo $Horario?>" required>
                    <label for="Horario" class="labelInput">Horário</label>
                </div>
                <br>
                <div>
                    <p>Status</p>
                    <input type="radio" name="StatusServ" id="confirmado" value="on" class="inputUser" <?php echo ($StatusServ == 'on') ? 'checked' : ''; ?> required>
                    <label for="confirmado" class="labelInput">Concluído</label>
                    <br>
                    <input type="radio" name="StatusServ" id="naoconfirmado" value="off" class="inputUser" <?php echo ($StatusServ == 'off') ? 'checked' : ''; ?> required>
                    <label for="naoconfirmado" class="labelInput">A fazer</label>
                </div>
                <br><br>
                <input type="hidden" name="id" value="<?php echo $idserv?>">
                <input type="submit" name="update" id="update" >
            </fieldset>
        </form>
    </div>
</body>
</html>