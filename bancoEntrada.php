<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
    
    <!--Link CSS-->
    <link rel="stylesheet" href="CSS/Entrada.css">

    <!--Link bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <!----------NAVBAR---------->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Conserv</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          </div>
        </div>
      </nav>

    <!----------LOGIN---------->
    <div class="logintela">
        <h1> Login </h1>
      <form action="loginteste.php" method="POST">
        <input type="text" name="id" placeholder="id">
        <br><br>
        <input type="password" name="senha" placeholder="senha">
        <br><br>
        <input type="submit" class="inputsubmit" name="submit" value="Entrar">
        </form>
    </div>      
</body>
</html>