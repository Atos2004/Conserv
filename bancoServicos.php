<?php
    session_start();
    include_once('bancoConfig.php');
    //print_r($_SESSION);
    
    if ((!isset($_SESSION["id"]) == true) and (!isset($_SESSION["senha"]) == true)) {

        unset($_SESSION ['id']);
        unset($_SESSION ['senha']);
        header("Location: loginteste.php");
    }

    $logado = $_SESSION['id'];

    $sql = "SELECT * FROM servico ORDER BY id_servico DESC";

    $result = $conexao ->query($sql);

    //print_r($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços</title>
    
  <!--Link CSS-->
    <link rel="stylesheet" href="CSS/servicos.css">

  <!--Link Script bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!--fontawesome-->
    <script src="https://kit.fontawesome.com/887c519871.js" crossorigin="anonymous"></script>

  <!--Script tabela-->
    <script src="JS/servicos.js" defer></script>
</head>

<body>
    
    <!----------------NAVBAR-------------------->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" id="navbar-brand" href="#">Conserv</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-link" href="bancoDash.php">Dashboard</a>
              <a class="nav-link" href="bancoClientes.php">Clientes</a>
              <a class="nav-link active" aria-current="page" href="bancoServicos.php">Serviços</a>
              <a class="nav-link" href="bancoProdutos.php">Produtos</a>
            </div>
          </div>
          <div class="d flex" >
            <a href="bancoSair.php" class="btn btn-danger me-5">Sair</a>
        </div>
        </div>
      </nav>
    
      <!----------------TABELA-------------------->
      <div class="table-responsive">
        <div class = "m-5">
        <table class="table table-hover
        table-bordered">
  <thead class="table-dark">
    <tr>
      <th scope="col">ID_Serviço</th>
      <th scope="col">Tipo</th>
      <th scope="col">ID_Cliente</th>
      <th scope="col">Valor do Serviço</th>
      <th scope="col">Data</th>
      <th scope="col">Horário</th>
      <th scope="col">Status</th>
      <div class = "button"><button><a href="addServicos.php"><b>Adicionar Serviço</b></a></button></div>
      <th scope="col">...</th>
      
    </tr>
  </thead>
  <tbody>


    <?php
      while ($user_data = mysqli_fetch_assoc($result)) 
      {
        echo "<tr>";
        echo "<td data-th = 'ID_Servico'>" . $user_data["id_servico"] ."</td>";
        echo "<td data-th = 'Tipo'>" . $user_data["Tipo"] ."</td>";
        echo "<td data-th = 'ID_Cliente'>" . $user_data["idCliente"] ."</td>";
        echo "<td data-th = 'Valor'>" . "R$" . $user_data["Valor"] ."</td>";
        echo "<td data-th = 'Data'>" . $user_data["Dataserv"] ."</td>";
        echo "<td data-th = 'Horario'>" . $user_data["Horario"] ."</td>";
        echo "<td class = 'no-header'><div class='status-circle " . ($user_data["StatusServ"] == 'on' ? 'status-on' : 'status-off') . "'></div></td>";
        echo "<td class = 'no-header'> 
                <div class= 'button-container'> 
                    <a class = 'btn btn-sm btn-dark' href = 'editServicos.php?id=$user_data[id_servico]'> <i class='fa-solid fa-pencil'></i></a>
                    <a class = 'btn btn-sm btn-danger' href = 'deleteServ.php?id=$user_data[id_servico]'> <i class='fa-solid fa-trash-can'></i> </a>
                   </div>
                </td>";
        echo "<tr>";

      }
    ?>
  </tbody>
</table>
</div>
</div>
     
</body>
</html>