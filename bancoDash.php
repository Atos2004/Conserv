<?php
session_start();
include_once('bancoConfig.php');

// Verificação de sessão
if ((!isset($_SESSION["id"]) == true) and (!isset($_SESSION["senha"]) == true)) {
    unset($_SESSION['id']);
    unset($_SESSION['senha']);
    header("Location: loginteste.php");
    exit();
}

$logado = $_SESSION['id'];

// Consulta para a soma do ganho total do mês atual
$sql = "SELECT SUM(Valor) AS ganho_total FROM servico WHERE MONTH(Dataserv) = MONTH(CURRENT_DATE()) AND YEAR(Dataserv) = YEAR(CURRENT_DATE()) AND StatusServ = 'on'";
$result = $conexao->query($sql);
$ganhoTotal = $result->num_rows > 0 ? $result->fetch_assoc()["ganho_total"] : 0;

// Consulta para a soma dos produtos comprados no mês atual
$sql = "SELECT SUM(valorProduto * quantidade) AS valor_total FROM produto";
$result = $conexao->query($sql);
$valorTotal = $result->num_rows > 0 ? $result->fetch_assoc()["valor_total"] : 0;

// Consulta para mostrar apenas os serviços que precisam ser feitos
$sql = "SELECT COUNT(StatusServ) AS afazer FROM servico WHERE StatusServ = 'off'";
$result = $conexao->query($sql);
$afazer = $result->num_rows > 0 ? $result->fetch_assoc()["afazer"] : 0;

// Consulta para obter ganhos mensais
$sql = "SELECT MONTH(Dataserv) AS mes, SUM(Valor) AS total_ganhos FROM servico WHERE StatusServ = 'on' GROUP BY MONTH(Dataserv)";
$result = $conexao->query($sql);
$ganhos_mensais = [];
while ($row = $result->fetch_assoc()) {
    $ganhos_mensais[] = [$row['mes'], (float)$row['total_ganhos']];
}
if (empty($ganhos_mensais)) {
    for ($i = 1; $i <= 12; $i++) {
        $ganhos_mensais[] = [$i, 0];
    }
}
$ganhos_mensais_json = json_encode($ganhos_mensais);

// Consulta para obter os bairros mais frequentes
$sql = "SELECT bairro, COUNT(*) AS total_servicos FROM cliente GROUP BY bairro ORDER BY total_servicos DESC";
$result = $conexao->query($sql);
$bairros_frequentes = [];
while ($row = $result->fetch_assoc()) {
    $bairros_frequentes[] = [$row['bairro'], (int)$row['total_servicos']];
}
if (empty($bairros_frequentes)) {
    $bairros_frequentes[] = ['Nenhum', 0];
}
$bairros_frequentes_json = json_encode($bairros_frequentes);

// Fechar a conexão
$conexao->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

<!--Link CSS-->
    <link rel="stylesheet" href="CSS/bancoDash.css">

<!--Link e Script bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!--Script charts-->  
    <script src="https://www.gstatic.com/charts/loader.js"></script>

<!--fontawesome-->
    <script src="https://kit.fontawesome.com/887c519871.js"></script>

<!-- Passando dados do PHP para JavaScript -->
    <script type="text/javascript">
        var bairros_frequentes_json = <?php echo $bairros_frequentes_json; ?>;
        var ganhos_mensais_json = <?php echo $ganhos_mensais_json; ?>;
    </script>

<!-- Carrega o arquivo JavaScript -->
    <script src="JS/dashboard.js"></script> 


</head>
<body>

<!---------NAVBAR---------->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Conserv</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="bancoDash.php">Dashboard</a>
                    <a class="nav-link" href="bancoClientes.php">Clientes</a>
                    <a class="nav-link" href="bancoServicos.php">Serviços</a>
                    <a class="nav-link" href="bancoProdutos.php">Produtos</a>
                </div>
            </div>
            <div class="d-flex">
                <a href="bancoSair.php" class="btn btn-danger me-5">Sair</a>
            </div>
        </div>
    </nav>

    <!---------BOXES---------->
    <div class="box-info">
        <div class="box-info-single" style="background: linear-gradient(117.5deg, rgb(89, 233, 162) 20.5%, rgb(29, 209, 185) 100.2%);">
            <div class="info-text">
                <h4>Ganho total deste mês</h4>
                <h5>R$ <?php echo number_format($ganhoTotal, 2, ',', '.'); ?></h5>
                <div><h4><i class="fa-solid fa-sack-dollar"></i></h4></div>
            </div>
        </div>
        <div class="box-info-single" style="background: linear-gradient(109.6deg, rgb(255, 219, 47) 11.2%, rgb(244, 253, 0) 100.2%);">
            <div class="info-text">
                <h4>Total de Produtos</h4>
                <h5>R$ <?php echo number_format($valorTotal, 2, ',', '.'); ?></h5>
                <div><h4><i class="fa-solid fa-bottle-water"></i></h4></div>
            </div>
        </div>
        <div class="box-info-single" style="background: linear-gradient(108.7deg, rgb(34, 219, 231) -0.9%, rgb(52, 118, 246) 88.7%);">
            <div class="info-text">
                <h4>Serviços a Fazer</h4>
                <h5><?php echo $afazer; ?></h5>
                <div><h4><i class="fa-solid fa-droplet"></i></h4></div>
            </div>
        </div>
    </div>

  <!---------CHARTS---------->
    <div id="columnchart_values" class="chart special-chart" style="width: 640px; height: 450px;"></div>
    <div id="curve_chart" class="chart" style="width: 640px; height: 450px;"></div>
</body>
</html>
