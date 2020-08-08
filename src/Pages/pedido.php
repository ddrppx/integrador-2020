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
        // $rows = $produtos -> read();
        } elseif ($_POST['categoria'] == 2) {
            $produtos = new acompDAO;
            // $rows = $produtos -> read();
    } elseif ($_POST['categoria'] == 3) {
        $produtos = new bebidaDAO;
        // $rows = $produtos -> read();

        }   
    }
    // echo "<br/>";
    // var_dump($rows);
    // echo $_POST['categoria'];

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

    <div class="container container-fluid">
        <div class="row">
            <div class="col text-center">
                <h2>Produtos</h2>
            </div>
        </div>
    </div>

    <div class="container my-2">
        <div class="row">

            <!-- Container Lateral -->
            <div class="col-12 col-md-3 borderGray" id="lateral-categoria">
                <div class="row d-flex flex-wrap card-column content-justify-around"
                <form name="form" method="post" action="">
        <!-- <div class="row d-sm-flex"> -->
                <!-- <div class="col-md-3 col-sm-4 my-0 mx-0 px-0 py-0 "> -->
                    <div class="card my-1 col-4 col-sm-4 col-md-12" onclick="sendSubmit('categoria',1)">
                        <div class="card-body">
                            <h5 class="card-title">Lanches</h5>
                        </div>
                        <img class="card-img-bottom mb-2" src="../static/svg/segment/lanches.svg" height="120px" width="120px" alt="Card image cap">
                    </div>
                <!-- </div> -->

                <!-- <div class="col-md-3 col-sm-4 my-0 mx-0 px-0 py-0"> -->
                    <div class="card my-1 col-4 col-sm-4 col-md-12" onclick="sendSubmit('categoria',2)">
                        <div class="card-body">
                            <h5 class="card-title">Acompanhamentos</h5>
                        </div>
                        <img class="card-img-bottom mb-2" src="../static/svg/segment/acompanhamentos.svg" height="120px" width="120px" alt="Card image cap">
                    </div>
                <!-- </div> -->

                <!-- <div class="col-md-3 col-sm-4 my-0 mx-0 px-0 py-0"> -->
                    <div class="card my-1 col-4 col-sm-4 col-md-12" onclick="sendSubmit('categoria',3)">
                        <div class="card-body">
                            <h5 class="card-title">Bebidas</h5>
                        </div>
                        <img class="card-img-bottom mb-2" src="../static/svg/segment/bebidas.svg" height="120px" width="120px" alt="Card image cap">
                    </div>
                <!-- </div> -->
                    <input type="hidden" id="categoria" name="categoria" value=""/>
                </form>
                </div>
                </div>
        <!-- </div> -->
            <!-- Container -->
            <div class="col-12 col-sm-12 col-md-9 borderGray" id="lateral-produtos">
                <div id="cards-container" class="card-columns d-flex flex-wrap">
                    <?php $produtos -> read_show(); ?>
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
        <div class="row flex-nowrap">
            <div class="col-md-6 text-right px-1">
                <button type="button" class="btn btn-lg btn-secondary">Cancelar</button>
            </div>
            <div class="col-md-6 text-left px-1">
                <button type="button" class="btn btn-lg btn-success">Confirmar</button>
            </div>
        </div>
    </div>

    <?php include "footer.php"; ?>