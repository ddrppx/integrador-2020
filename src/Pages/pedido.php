<?php

use Models\acompDAO;
use Models\bebidaDAO;
use Models\lancheDAO;

session_start();

    require_once "../../vendor/autoload.php";

    if(isset($_POST['pagamento'])){
        $pag = $_POST['pagamento'];
    } else {
        $errors[] = "Post pagamento não recebido.";
    }

        //Checa se $_POST['categoria'] existe
    if(isset($_POST['categoria'])) {

        if($_POST['categoria'] == 1) {
        $produtos = new lancheDAO;
        $rows = $produtos -> read();
        echo "Lanche";
        } elseif ($_POST['categoria'] == 2) {
            $produtos = new acompDAO;
            $rows = $produtos -> read();
        echo "Acomp";
    } elseif ($_POST['categoria'] == 3) {
        $produtos = new bebidaDAO;
        $rows = $produtos -> read();
        echo "Bebida";

        }   
    }
    echo "<br/>";
    var_dump($rows);
    echo $_POST['categoria'];

    $acp = new acompDAO;
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
                    <?php $acp -> read_show(); ?>

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
                <?php //$acp -> read_show(); ?>
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