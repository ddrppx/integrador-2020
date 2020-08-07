<?php

use Models\lancheDAO;

session_start();

    require_once "../../vendor/autoload.php";

    if(isset($_POST)){
        $pag = $_POST['pagamento'];
        echo $_POST['categoria'];
    } else {
        $errors[] = "Post pagamento não recebido.";
    }

    $produtos = new lancheDAO;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Produtos</title>
	
	<link rel="stylesheet" href="../bootstrap4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/main.css" />

</head>
<body>

    <?php include_once "header.php"; ?>

    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2>Produtos</h2>
            </div>
        </div>
    </div>

    <div class="container my-2">
        <div class="row">

            <!-- Container Lateral -->
            <div class="col-sm-12 col-md-3 borderGray" id="lateral-categoria">
                <form name="form" method="post" action=""/>
                    <div class="card my-2" onclick="sendSubmit('categoria',1)">
                        <div class="card-body">
                            <h5 class="card-title">Lanches</h5>
                        </div>
                        <img class="card-img-bottom mb-2" src="../static/svg/segment/lanches.svg" height="110px" width="110px" alt="Card image cap">
                    </div>

                    <div class="card my-2" onclick="sendSubmit('categoria',2)">
                        <div class="card-body">
                            <h5 class="card-title">Acompanhamentos</h5>
                        </div>
                        <img class="card-img-bottom mb-2" src="../static/svg/segment/acompanhamentos.svg" height="110px" width="110px" alt="Card image cap">
                    </div>

                    <div class="card my-2" onclick="sendSubmit('categoria',3)">
                        <div class="card-body">
                            <h5 class="card-title">Bebidas</h5>
                        </div>
                        <img class="card-img-bottom mb-2" src="../static/svg/segment/bebidas.svg" height="110px" width="110px" alt="Card image cap">
                    </div>

                    <input type="hidden" id="categoria" name="categoria" value=""/>
                </form>
        </div>

            <!-- Container -->
            <div class="col-sm-12 col-md-9 borderGray" id="lateral-produtos">
                <div id="cards_container" class="card-columns">
                    <?php $rows = $produtos -> read(); 
                    foreach ($rows as $row) {
                    ?>
                    <div class="card my-2">
                        <img class="card-img-top mb-2" src="../static/svg/segment/lanches.svg" height="110px" width="110px" alt="Card image cap">
                        <div class="card-body">
                        <p class="card-title h5"><?= $row['nome'] ?></p>
                        <p class="card-title h6 text-right"><?= "R$".number_format($row['valor'],2) ?></p>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Itens</h2>
            </div>
            <div class="col card-columns sliderItens borderGray text-left vertAlign">

                    <div class="card mb-0 mt-0">
                        <div class="card-body">
                            <h5 class="card-title">Lanche 2</h5>
                        </div>
                        <img class="card-img-bottom" src="../static/svg/segment/lanches.svg" height="110px" width="110px" alt="Card image cap">
                    </div>

                    <div class="card mb-0 mt-0">
                        <div class="card-body">
                        <h5 class="card-title">Acompanhamento 1</h5>
                    </div>
                        <img class="card-img-bottom mb-2" src="../static/svg/segment/acompanhamentos.svg" height="110px" width="110px" alt="Card image cap">
                    </div>

                    
                    <div class="card mb-0 mt-0">
                        <div class="card-body">
                            <h5 class="card-title">Bebida 3</h5>
                        </div>
                            <img class="card-img-bottom mb-2" src="../static/svg/segment/bebidas.svg" height="110px" width="110px" alt="Card image cap">
                    </div>

                    <div class="card mb-0 mt-0">
                        <div class="card-body">
                            <h5 class="card-title">Sobremesa 5</h5>
                        </div>
                            <img class="card-img-bottom mb-2" src="../static/svg/segment/sobremesas.svg" height="110px" width="110px" alt="Card image cap">
                    </div>                    
            </div>
        </div>
    </div>
    
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-6 text-right px-1">
                <button type="button" class="btn btn-lg btn-secondary">Cancelar</button>
            </div>
            <div class="col-md-6 text-left px-1">
                <button type="button" class="btn btn-lg btn-success">Confirmar</button>
            </div>
        </div>
    </div>

    <?php include "footer.php"; ?>