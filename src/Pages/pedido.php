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

    if (isset($_POST['categoria'])) { // check if POST have that index or not
        $category = $_POST['categoria']; // if yes then reassign it's value
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
        if (!isset($_SESSION['lanches'])){
            $_SESSION['lanches'] = [];

        }
        
        if (!isset($_SESSION['bebidas'])){
            $_SESSION['bebidas'] = [];
        }
        
        if (!isset($_SESSION['acomp'])){
            $_SESSION['acomp'] = [];
        }

        var_dump($_SESSION);
        if (isset($_GET['carrinho']) && $_GET['carrinho'] == '1'){
            $idProduto = $_GET['id'];
            echo "Id produto: $idProduto";
            if(isset($_GET['type']) && $_GET['type'] == 1){
 
                if(!isset($_GET['lanches'][$idProduto])){
                    $_SESSION['lanches'][$idProduto] = 1;
                } else {
                    $_SESSION['lanches'][$idProduto] += 1;
                }
            }

            if(isset($_GET['type']) && $_GET['type'] == 2){

                if(!isset($_GET['bebidas'][$idProduto])){
                    $_SESSION['bebidas'][$idProduto] = 1;
                } else {
                    $_SESSION['bebidas'][$idProduto] += 1;
                }
            }

            if(isset($_GET['type']) && $_GET['type'] == '3'){
                echo "<br/>Acomp flag<br/>";
                if(!isset($_GET['type'][$idProduto])){
                    $_SESSION['acomp'][$idProduto] = 1;
                } else {
                    $_SESSION['acomp'][$idProduto] += 1;
                }
            }

            
            // if(!isset($_SESSION['itens'][$idProduto])) {
            //     $_SESSION['itens'][$idProduto] = 1;

            // } else {
            //     $_SESSION['itens'][$idProduto] += 1;
            // }
        }
        
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
            <div class="col text-center">
                <h2>Produtos</h2>
            </div>
        </div>
    </div>

    <div class="container my-2">
        <div class="row">

            <!-- Container Lateral -->
            <div class="col-12 col-md-3 borderGray" id="lateral-categoria">
                <div class="row d-flex flex-wrap card-columns justify-content-center">
                <form name="form" id="form-categoria" method="post" action="">
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
                <form name="produtos" id="form-produtos" method="get" action="">
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
            <div class="col-12">
                <h2>Itens</h2>
            </div>
            <div class="col card-columns sliderItens borderGray text-left vertAlign">
                <?php
                // echo count($_SESSION['itens']);
                // if (count($_SESSION['itens']) == 0) {
                //     echo 'Não há itens no pedido'; 
                // }else {
                    // echo "<pre>";
                    var_dump($_SESSION['lanches']);
                    var_dump($_SESSION['bebidas']);
                    var_dump($_SESSION['acomp']);
                    // echo "</pre>";
                // }
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