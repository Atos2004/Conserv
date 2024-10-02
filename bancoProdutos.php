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

    $sql = "SELECT * FROM produto ORDER BY idproduto DESC";

    $result = $conexao ->query($sql);

    //print_r($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
   
  <!--Link CSS-->
  <link rel="stylesheet" href="CSS/produtos.css">

  <!--Link Script bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!--fontawesome-->
    <script src="https://kit.fontawesome.com/887c519871.js" crossorigin="anonymous"></script>

  <!--Script tabela-->
  <script src="JS/tabelaprodutos.js" defer></script>

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
              <a class="nav-link" href="bancoServicos.php">Serviços</a>
              <a class="nav-link active" aria-current="page" href="bancoProdutos.php">Produtos</a>
              
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
      <th scope="col">ID_Produto</th>
      <th scope="col">Marca</th>
      <th scope="col">Valor</th>
      <th scope="col">Quantidade</th>
      <div class = "button"><button><a href="addProdutos.php"><b>Adicionar Produto</b></a></button></div>
      <th scope="col"></th>
      
    </tr>
  </thead>
  <tbody>


    <?php
      while ($user_data = mysqli_fetch_assoc($result)) 
      {
        echo "<tr>";
        echo "<td data-th = 'idproduto'>" . $user_data["idproduto"] ."</td>";
        echo "<td data-th = 'marca'>" . $user_data["marca"] ."</td>";
        echo "<td data-th = 'valorProduto'>" . "R$" . $user_data["valorProduto"] ."</td>";
        echo "<td data-th = 'quantidade'>" . $user_data["quantidade"] ."</td>";
        echo "<td class = 'no-header'> 
                <div class= 'button-container'> 
                    <a class = 'btn btn-sm btn-dark' href = 'editProdutos.php?id=$user_data[idproduto]'> <i class='fa-solid fa-pencil'></i></a>
                    <a class = 'btn btn-sm btn-danger' href = 'deleteProd.php?id=$user_data[idproduto]'> <i class='fa-solid fa-trash-can'></i> </a>
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