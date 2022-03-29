<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO :: 
    <?php $url = str_replace("pdo/", "", $_SERVER["REQUEST_URI"]); 
        $url = explode(".php", $url);
        $url = explode("/", $url[0]);
        if($url[1] == 'index' || $url[1] == '' ){
            echo 'Ínicio';
        }else{
            echo ucfirst($url[1]);
        }
    ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/bank.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark justify-content-center">
  <ul class="nav justify-content-center my-4">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="index.php">Ínicio</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="transferir.php">Tranferir</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="cadastrar.php">Cadastrar</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="editar.php">Editar</a>
    </li>
  </ul>
</nav>
<header>
        <div class="container">
            <div class="row ">
                <div class="col-12 py-3 d-flex justify-content-center">
                    <h1>
                        <?php $url = str_replace("pdo/", "", $_SERVER["REQUEST_URI"]); 
                            $url = explode(".php", $url);
                            $url = explode("/", $url[0]);
                            if($url[1] == 'index'){
                                echo 'Banco de Valores';
                            }else{
                                echo ucfirst($url[1]);
                            }
                        ?>
                    </h1>
                </div>
            </div>
        </div>
</header>

<?php 
require_once('DB.php');
$conexao = DB::getConnection();
?>