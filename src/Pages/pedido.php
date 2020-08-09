<?php

use Models\acompDAO;
use Models\bebidaDAO;
use Models\lancheDAO;

session_start();

    require_once "../../vendor/autoload.php";

    if(isset($_POST['pagamento'])){
        $pag = $_POST['pagamento'];
        $produtos = new lancheDAO;
    }

    // unset($_SESSION['acomps']);
    // unset($_SESSION['bebidas']);
    // unset($_SESSION['lanches']);

    if (isset($_GET['categoria'])) { // check if POST have that index or not
        $category = $_GET['categoria']; // if yes then reassign it's value
        $_SESSION['categoria'] = $category;  // set reassigned value to session variable
    }
    // $produtos = new lancheDAO;
        //Checa se $_POST['categoria'] existe
    // if(!isset($_POST['categoria']) || !isset($_SESSION['categoria'])) {
    //      $_SESSION['categoria'] = $_POST['categoria'];
    
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

        if(!isset($_SESSION['preco'])){
            $_SESSION['preco'] = 0.00;
        }
    // }
    // } else {
    //     $produtos = new lancheDAO;
    // }
    // echo "<br/>";
    // var_dump($rows);
    // echo $_POST['categoria'];

        // var_dump($_POST);
        // echo "<br/>";
        // var_dump($_GET);
            //-----Carrinho-----
        // if (!isset($_SESSION['lanches'])){
        //     $_SESSION['lanches'] = [];

        // }
        
        // if (!isset($_SESSION['bebidas'])){
        //     $_SESSION['bebidas'] = [];
        // }
        
        // if (!isset($_SESSION['acomp'])){
        //     $_SESSION['acomp'] = [];
        // }

        // var_dump($_SESSION);
        // if (isset($_GET['carrinho']) && $_GET['carrinho'] == '1'){
        //     $idProduto = $_GET['id'];
        //     echo "Id produto: $idProduto";
        //     if(isset($_GET['type']) && $_GET['type'] == 1){
 
        //         if(!isset($_GET['lanches'][$idProduto])){
        //             $_SESSION['lanches'][$idProduto] = 1;
        //         } else {
        //             $_SESSION['lanches'][$idProduto] += 1;
        //         }
        //     }

        //     if(isset($_GET['type']) && $_GET['type'] == 2){

        //         if(!isset($_GET['bebidas'][$idProduto])){
        //             $_SESSION['bebidas'][$idProduto] = 1;
        //         } else {
        //             $_SESSION['bebidas'][$idProduto] += 1;
        //         }
        //     }

        //     if(isset($_GET['type']) && $_GET['type'] == '3'){
        //         echo "<br/>Acomp flag<br/>";
        //         if(!isset($_GET['type'][$idProduto])){
        //             $_SESSION['acomp'][$idProduto] = 1;
        //         } else {
        //             $_SESSION['acomp'][$idProduto] += 1;
        //         }
        //     }

            

            
            // if(!isset($_SESSION['itens'][$idProduto])) {
            //     $_SESSION['itens'][$idProduto] = 1;

            // } else {
            //     $_SESSION['itens'][$idProduto] += 1;
            // }
        // }
        
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
            // foreach ($_SESSION['itens'] as $idProduto => $quantidade) {
            //     $prods = $produtos -> readId($idProduto);
                
                
            //     echo "Nome: ". $prods[0]['nome']. "<br/>";
            //     echo "Valor: ". $prods[0]['valor']. "<br/>";
            //     echo "Quantidade ". $quantidade ."<br/>";
            //     echo "Total: ". ($prods[0]['valor'] * $quantidade);
            //     echo '<a href="remover.php?remover=carrinho&&id='. $idProduto.'"> Remover </a>'. "<hr/><br/>"; 
            // } 

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
                    <div class="card my-1 mx-0 col-sm-3 col-md-12" onclick="sendSubmit('categoria',1)">
                        <div class="card-body">
                            <h5 class="card-title">Lanches</h5>
                        </div>
                        <img class="card-img-bottom mb-2" src="../static/svg/segment/lanches.svg" height="120px" width="120px" alt="Card image cap">
                    </div>
                <!-- </div> -->

                <!-- <div class="col-md-3 col-sm-4 my-0 mx-0 px-0 py-0"> -->
                    <div class="card my-1 mx-0  col-sm-3 col-md-12" onclick="sendSubmit('categoria',2)">
                        <div class="card-body">
                            <h5 class="card-title">Acompanhamentos</h5>
                        </div>
                        <img class="card-img-bottom mb-2" src="../static/svg/segment/acompanhamentos.svg" height="120px" width="120px" alt="Card image cap">
                    </div>
                <!-- </div> -->

                <!-- <div class="col-md-3 col-sm-4 my-0 mx-0 px-0 py-0"> -->
                    <div class="card my-1 mx-0  col-sm-3 col-md-12" onclick="sendSubmit('categoria',3)">
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
                <form name="produtos" id="form-produtos" method="get" action="carrinho.php">
                <div id="cards-container" class="card-columns d-flex flex-wrap justify-content-evenly">
                    <?php 
                    isset($produtos)? $produtos -> read_show() : var_dump($produtos); ?>
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
                <span id="preco" class="h4 btn-primary disable">R$<?= number_format($_SESSION['preco'], 2) ?></span>
            </div>
            <div class="col card-columns sliderItens borderGray text-left vertAlign">
                <?php

                if (count($_SESSION['lanches']) == 0 && count($_SESSION['bebidas']) == 0 && count($_SESSION['acomp']) == 0) {
                    echo '<p class="h1">Pedido Vazio.</p>'; 
                }else {
                    if (!$_SESSION['lanches'] == 0){
                        foreach ($$_SESSION['lanches'] as $id => $qtd) {
                            ?>

                            <?php
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
                <button type="button" class="btn btn-lg btn-secondary">Cancelar</button>
            </div>
            <div class="col-md-6 text-left px-1">
                <button type="button" class="btn btn-lg btn-success">Confirmar</button>
            </div>
        </div>
    </div>

    <?php include "footer.php"; ?>