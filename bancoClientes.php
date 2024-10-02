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

    $sql = "SELECT * FROM cliente ORDER BY ID_Cliente DESC";

    $result = $conexao ->query($sql);

    //print_r($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar clientes</title>

    <link rel="stylesheet" href="CSS/bancoClients.css">

  <!--ícones fontawesome-->
    <script src="https://kit.fontawesome.com/887c519871.js" crossorigin="anonymous"></script>

    <!--Link bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!--Script bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!--Script tabela-->
  <script src="JS/tabelaClientes.js" defer></script>

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
              <a class="nav-link active" aria-current="page" href="bancoClientes.php">Clientes</a>
              <a class="nav-link" href="bancoServicos.php">Serviços</a>
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
      <th scope="col">ID_Cliente</th>
      <th scope="col">Nome_Cliente</th>
      <th scope="col">Telefone</th>
      <th scope="col">Cidade</th>
      <th scope="col">Bairro</th>
      <th scope="col">Endereço</th>
      <div class = "button"><button><a href="addClientes.php"><b>Adicionar Cliente</b></a></button></div>
      <th scope="col">...</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
      while ($user_data = mysqli_fetch_assoc($result)) 
      {
        echo "<tr>";
        echo "<td data-th= 'ID_Cliente'>" . $user_data["ID_Cliente"] ."</td>";
        echo "<td class = 'no-header'>" . $user_data["NomeCliente"] ."</td>";
        echo "<td class = 'no-header'>" . $user_data["Telefone"] ."</td>";
        echo "<td class = 'no-header'>" . $user_data["cidade"] ."</td>";
        echo "<td class = 'no-header'>" . $user_data["bairro"] ."</td>";
        $endereco = htmlspecialchars($user_data["Endereco"]);
        $endereco_url = "https://www.google.com/maps/search/?api=1&query=" . urlencode($endereco);
        echo "<td class = 'no-header'><a href='$endereco_url' target='_blank'>$endereco</a></td>";
        echo "<td class = 'no-header'>
                  <div class= 'button-container'>        
        <a class = 'btn btn-sm btn-dark' href = 'edit.php?id=$user_data[ID_Cliente]'> <i class='fa-solid fa-pencil'></i></a>
                    <a class = 'btn btn-sm btn-danger' href = 'delete.php?id=$user_data[ID_Cliente]'> <i class='fa-solid fa-trash-can'></i> </a>
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