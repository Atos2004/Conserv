<?php
    if (isset($_POST['submit'])){
    

    include_once('config.php');

    $Tipo = ($_POST['Tipo']);
    $idCliente = ($_POST['idCliente']);
    $Valor = ($_POST['Valor']);
    $Data = ($_POST['DataServ']);
    $Horario = ($_POST['Horario']);
    $StatusServ = ($_POST['StatusServ']);
    

    $result = mysqli_query($conexao, "INSERT INTO servico (Tipo,idCliente,Valor,Dataserv,Horario,StatusServ)
    VALUES ('$Tipo', '$idCliente', '$Valor', '$Data', '$Horario', '$StatusServ')");

    header("Location: dadosEnviadosServ.php");
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços </title>
    
    <link rel="stylesheet" href="CSS/addServicos.css">

</head>
<body> 
    <div class="box">
        <form action="addServicos.php" method="POST">
            
            <fieldset>
                <legend><b>Serviços</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="Tipo" id="Tipo" class="inputUser" required>
                    <label for="Tipo" class="labelInput">Tipo do serviço</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="idCliente" id="idCliente" class="inputUser" required>
                    <label for="idCliente" class="labelInput">ID do cliente</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="Valor" id="Valor" class="inputUser" required>
                    <label for="Valor" class="labelInput">Valor</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="date" name="DataServ" id="DataServ" class="inputUser" required>
                    <label for="DataServ" class="labelInput">Data</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="time" name="Horario" id="Horario" class="inputUser" required>
                    <label for="Horario" class="labelInput">Horário</label>
                </div>
                <br>
                <div>
                    <p>Status</p>
                    <input type="radio" name="StatusServ" id="confirmado" value="on" class="inputUser" required>
                    <label for="confirmado" class="labelInput">Concluído</label>
                    <br>
                    <input type="radio" name="StatusServ" id="naoconfirmado" value="off" class="inputUser" required>
                    <label for="naoconfirmado" class="labelInput">A fazer</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit" >
            </fieldset>
        </form>
    </div>
</body>
</html>