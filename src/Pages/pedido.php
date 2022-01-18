<?php

use Models\AcompDAO;
use Models\bebidaDAO;
use Models\lancheDAO;

    session_start();

    require_once "../../vendor/autoload.php";

        //Indica a origem do request(?) para a outra pagina
    $_SESSION['origem'] = 'pedido.php'; 

    if(isset($_GET['pagamento'])){
        $pag = $_GET['pagamento'];
        $_SESSION['pagamento'] = $pag;
        $produtos = new lancheDAO;
    }

    if (isset($_GET['categoria'])) { // check if POST have that index or not
        $category = $_GET['categoria']; // if yes then reassign it's value
        $_SESSION['categoria'] = $category;  // set reassigned value to session variable
    }
        //Se nao existir SESSION['lanches']
        if (!isset($_SESSION['lanches'])){
            $_SESSION['lanches'] = [];
            
        }
        
        //Se nao existir SESSION['bebidas']
        if (!isset($_SESSION['bebidas'])){
            $_SESSION['bebidas'] = [];
        }
        
            //Se nao existir SESSION['acomp']
        if (!isset($_SESSION['acomp'])){
            $_SESSION['acomp'] = [];
        }

        // if (!isset($_GET['categoria'])){
        //     $_SESSION['categoria'] == 1;
        // }

        if(isset($_SESSION['categoria'])) {
            if($_SESSION['categoria'] == 1) {
                $produtos = new lancheDAO;
            // $rows = $produtos -> read();
            } elseif ($_SESSION['categoria'] == 2) {
                $produtos = new acompDAO;
                // $rows = $produtos -> read();
            } elseif ($_SESSION['categoria'] == 3) {
                $produtos = new bebidaDAO;
            // $rows = $produtos -> read();
            }
        } else {
            $_SESSION['categoria'] = 1;
            $produtos = new lancheDAO;
        }

        if(!isset($_SESSION['preco'])){
            $_SESSION['preco'] = 0.00;
        }
        
            //Checa o tipo atual do display (Lanche, Acompanhamento ou Bebida)
        switch (strtolower(get_class($produtos))){
            case 'models\lanchedao':
                $type = 1;
                break;
            case 'models\bebidadao':
                $type = 2;
                break;
            case 'models\acompdao':
                $type = 3;
                break;
        }
 

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Realize seu pedido</title>
	
	<link rel="stylesheet" href="../bootstrap4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="shortcut icon" href="../Static/favicon.ico" />
</head>
<body>

    <?php include_once "header.php"; ?>

    <div class="container container-fluid">
        <div class="row">
            <div class="col-3 text-left">
                <button class="btn btn-secondary" id="pedido-voltar" onclick="voltarPagamento()">
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M7.854 4.646a.5.5 0 0 1 0 .708L5.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z"/>
                       <path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h6.5a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                    Voltar</button>
            </div>
            <div class="col-6 text-center">
                <h2>Produtos</h2>
            </div>
            <div class="col-3 text-center">
            </div>
        </div>
    </div>

    <div class="container my-2">
        <div class="row">

            <!-- Container Lateral -->
            <div class="col-12 col-md-3 borderGray" id="lateral-categoria">
                <div class="row d-flex flex-wrap card-columns justify-content-center">
                <form name="form" id="form-categoria" method="get" action="">
        <!-- <div class="row d-sm-flex"> -->
                <!-- <div class="col-md-3 col-sm-4 my-0 mx-0 px-0 py-0 "> -->
                    <div class="card my-1 mx-0 col-sm-3 col-md-12 itemHover" onclick="sendSubmit('categoria',1)">
                        <div class="card-body">
                            <h5 class="card-title">Lanches</h5>
                        </div>
                        <img class="card-img-bottom mb-2" src="../Static/svg/segment/lanches.svg" height="120px" width="120px" alt="Card image cap">
                    </div>
                <!-- </div> -->

                <!-- <div class="col-md-3 col-sm-4 my-0 mx-0 px-0 py-0"> -->
                    <div class="card my-1 mx-0  col-sm-3 col-md-12 itemHover" onclick="sendSubmit('categoria',2)">
                        <div class="card-body">
                            <h5 class="card-title">Acompanhamentos</h5>
                        </div>
                        <img class="card-img-bottom mb-2" src="../Static/svg/segment/acompanhamentos.svg" height="120px" width="120px" alt="Card image cap">
                    </div>
                <!-- </div> -->

                <!-- <div class="col-md-3 col-sm-4 my-0 mx-0 px-0 py-0"> -->
                    <div class="card my-1 mx-0  col-sm-3 col-md-12 itemHover" onclick="sendSubmit('categoria',3)">
                        <div class="card-body">
                            <h5 class="card-title">Bebidas</h5>
                        </div>
                        <img class="card-img-bottom mb-2" src="../Static/svg/segment/bebidas.svg" height="120px" width="120px" alt="Card image cap">
                    </div>
                <!-- </div> -->
                    <input type="hidden" id="categoria" name="categoria" value=""/>
                </form>
                </div>
                </div>
        <!-- </div> -->
            <!-- Container -->
            <div class="col-12 col-sm-12 col-md-9 borderGray" id="lateral-produtos">
                <form name="produtos" id="form-produtos" method="get" action="carrinho.php">
                <div id="cards-container" class="card-columns d-flex flex-wrap justify-content-evenly">
                    <?php 
                    isset($produtos) ? $produtos -> readShowAll() : var_dump($produtos); ?>
                </div>
                <input type="hidden" name="type" value="<?= $type ?>">
                <input type="hidden" name="carrinho" value="1">
                <input type="hidden" name="id" id="add" value="">
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-6 text-left d-flex flex-nowrap">
                <h2>Itens do pedido</h2>
            </div>
            <div class="col-6 text-right flex-nowrap">
                <span id="preco" class="h3 btn-primary disable align-middle">R$<?= number_format($_SESSION['preco'], 2) ?></span>
            </div>
            <div class="col card-columns borderGray text-left vertAlign d-flex flex-nowrap justify-content-evenly" id="cartSlider">
                <?php

                if (count($_SESSION['lanches']) == 0 && count($_SESSION['bebidas']) == 0 && count($_SESSION['acomp']) == 0) {
                    $itens = 0;
                    echo '<span class="h5 emptyCart">Não há itens no pedido...</span>'; 
                }else {
                    $itens = 1;
                        //Se tal count(lanches) nao for igual a zero
                        if (!$_SESSION['lanches'] == 0){
                            $lcDAO = new lancheDAO;
                            foreach ($_SESSION['lanches'] as $id => $qtd) {
                                $lcDAO -> readWhereOutput($id, $qtd);
                        }
                    }
                        //Se tal count(bebidas) nao for igual a zero
                    if (!$_SESSION['bebidas'] == 0){
                        $bbdDAO = new bebidaDAO;
                        foreach ($_SESSION['bebidas'] as $id => $qtd) {
                            $bbdDAO -> readWhereOutput($id, $qtd);
                        }
                    }
                        //Se tal count(acomp) nao for igual a zero
                    if (!$_SESSION['acomp'] == 0){
                        $acpDAO = new acompDAO;
                        foreach ($_SESSION['acomp'] as $id => $qtd) {
                            $acpDAO -> readWhereOutput($id, $qtd);
                        }
                    }
                }

            ?>

            </div>
        </div>
    </div>
    
    <div class="container mt-2">
        <div class="row flex-nowrap">
            <div class="col-md-6 text-right px-1">
                <button type="button" class="btn btn-lg btn-secondary" data-toggle="modal" data-target="#cancelModal">Cancelar</button>
            </div>
            <div class="col-md-6 text-left px-1">
                <button type="button" onclick="confirmar(<?= $itens ?>)"class="btn btn-lg btn-success">Confirmar</button>
            </div>
        </div>
    </div>

        <!-- Modal -->
    <div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="cancelModalLabel">Cancelar?</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="h5">Ao clicar em em 'Continuar' você irá cancelar totalmente o pedido, o levando à tela inicial.</p>
                    <p class="h5">Tem certeza que deseja proseguir?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Voltar</button>
                    <form name="cancel" method="get" action="cancelar.php">
                        <button type="submit" class="btn btn-danger">Continuar</button>
                        <input type="hidden" name="cancelar" id="input-cancel" value="1"/>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php 
        require "footer.php";
    ?>
