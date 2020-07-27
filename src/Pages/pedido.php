<?php
    session_start();

    require_once "../../vendor/autoload.php";

    if(isset($_POST)){
        $pag = $_POST['pagamento'];
    } else {
        $errors[] = "Post pagamento não recebido.";
    }
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

            <div class="card my-2" onclick="selecionarCat('1')">
                <div class="card-body">
                    <h5 class="card-title">Lanches</h5>
                </div>
                <img class="card-img-bottom mb-2" src="../static/svg/segment/lanches.svg" height="110px" width="110px" alt="Card image cap">
            </div>

            <div class="card my-2" onclick="selecionarCat('2')">
                <div class="card-body">
                    <h5 class="card-title">Acompanhamentos</h5>
                </div>
                <img class="card-img-bottom mb-2" src="../static/svg/segment/acompanhamentos.svg" height="110px" width="110px" alt="Card image cap">
            </div>

            <div class="card my-2" onclick="selecionarCat('3')">
                <div class="card-body">
                    <h5 class="card-title">Bebidas</h5>
                </div>
                <img class="card-img-bottom mb-2" src="../static/svg/segment/bebidas.svg" height="110px" width="110px" alt="Card image cap">
            </div>

            <div class="card my-2" onclick="selecionarCat('4')">
                <div class="card-body">
                    <h5 class="card-title">Sobremesas</h5>
                </div>
                <img class="card-img-bottom mb-2" src="../static/svg/segment/sobremesas.svg" height="110px" width="110px" alt="Card image cap">
            </div>

            <div class="card my-2" onclick="selecionarCat('5')">
                <div class="card-body">
                    <h5 class="card-title">Pratos</h5>
                </div>
                <img class="card-img-bottom mb-2" src="../static/svg/segment/pratos.svg" height="110px" width="110px" alt="Card image cap">
            </div>

            </div>

            <!-- Container -->
            <div class="col-sm-12 col-md-9 borderGray" id="lateral-produtos">
                <div id="cards_container" class="card-columns">

                    <div class="card my-2">
                        <div class="card-body">
                            <h5 class="card-title">Lanche 1</h5>
                        </div>
                        <img class="card-img-bottom mb-2" src="../static/svg/segment/lanches.svg" height="110px" width="110px" alt="Card image cap">
                    </div>

                    <div class="card my-2">
                        <div class="card-body">
                            <h5 class="card-title">Lanche 2</h5>
                        </div>
                        <img class="card-img-bottom mb-2" src="../static/svg/segment/lanches.svg" height="110px" width="110px" alt="Card image cap">
                    </div>

                    <div class="card my-2">
                        <div class="card-body">
                            <h5 class="card-title">Lanche 3</h5>
                        </div>
                        <img class="card-img-bottom mb-2" src="../static/svg/segment/lanches.svg" height="110px" width="110px" alt="Card image cap">
                    </div>
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

    <div class="container">
            <div class="row">
                    <div class="col text-right mt-1">
                    Ícones por: <a href="https://www.flaticon.com/authors/iconixar" title="iconixar">Iconixar</a>,<a href="https://www.flaticon.com/authors/google" title="Google">Google</a> e <a href="https://www.flaticon.com/authors/pause08" title="Pause08">Pause08</a>.
                </div>
            </div>
        </div>

    <?php include "footer.php"; ?>