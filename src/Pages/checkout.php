<?php

use Models\acompDAO;
use Models\bebidaDAO;
use Models\lancheDAO;

session_start();
    require_once "../../vendor/autoload.php";

    $_SESSION['origem'] = "checkout.php";


    if (count($_SESSION['lanches']) == 0 && count($_SESSION['bebidas']) == 0 && count($_SESSION['acomp']) == 0) {
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=pedido.php">';
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Checkout</title>
	
	<link rel="stylesheet" href="../bootstrap4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="shortcut icon" href="../static/favicon.ico" />

</head>
<body>

    <?php include_once "header.php"; ?>

    <div class="container container-fluid">
        <div class="row">
            <div class="col-3 text-left">
                <button class="btn btn-secondary" id="pedido-voltar" onclick="voltarPedido()">
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M7.854 4.646a.5.5 0 0 1 0 .708L5.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z"/>
                       <path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h6.5a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                    Voltar</button>
            </div>
            <div class="col-6 text-center">
                <h2>Checkout</h2>
            </div>
            <div class="col-3 text-center">
            </div>
        </div>
    </div>

            <!-- Container -->
            <div class="col-12 borderGray mb-2" id="produtos-checkout">
                <?php

                    if (count($_SESSION['lanches']) == 0 && count($_SESSION['bebidas']) == 0 && count($_SESSION['acomp']) == 0) {
                    } else {
                            //Se tal count(lanches) nao for igual a zero id, nome, valor, imagem
                            if (!$_SESSION['lanches'] == 0){
                                $lcDAO = new lancheDAO;
                                foreach ($_SESSION['lanches'] as $id => $qtd) {
                                    $res = $lcDAO -> readID($id);
                                    $imgPath = '..'.DS.'Static'.DS.'produtos'.DS.$res['imagem'];
                                    ?>
                                        <div class="row card-columns d-flex flex-wrap justify-content-evenly">
                                            <div class="col-4 vertAlign cartHover">
                                                    <img class="card-img-top mb-2" src="<?= $imgPath ?>" height="140px" width="140px" alt="Card image cap">
                                                    <p class="h5 text-center">
                                                        <?= $res['nome']?><br/> R$<?= number_format($res['valor'],2) ?>
                                                    </p>
                                            </div>
                                            <div class="col-4 vertAlign d-flex justify-content-center">
                                                <span class="h2 borderGray mx-1 my-1 px-3 py-2 mr-1"><?= 'x '.$qtd ?></span>
                                            </div>
                                            <div class="col-4 vertAlign d-flex justify-content-center">
                                            <button type="button" class="btn btn-success p-0"  id="btnplus" onclick="aumentarQtd(1,<?= $res['id'] ?>)"><b>
                                                <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                                                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                                                 </svg></b>
                                            </button>
                                                <!-- <button class="btn btn-primary" id="btnminus"><b>-</b></button> -->
                                            <button type="button" class="btn btn-info p-0 ml-1 mr-1" onclick="diminuirQtd(1,<?= $res['id'] ?>)"><b>
                                                <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-dash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M3.5 8a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.5-.5z"/>
                                                </svg>
                                                </svg></b>
                                            </button>

                                            <button type="button" class="btn btn-danger p-0" onclick="removerProd(1,<?= $res['id'] ?>)"><b>
                                                <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" onclick="removerProd(1, <?= $res['id'] ?>)" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
                                                    <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
                                                </svg></b>
                                            </button>
                                            </div>

                                    </div>
                                    
                                    <?php
                                }
                        }

                            //Se tal count(bebidas) nao for igual a zero
                        if (!$_SESSION['bebidas'] == 0){
                            $bbdDAO = new bebidaDAO;
                            foreach ($_SESSION['bebidas'] as $id => $qtd) {
                                $res = $bbdDAO -> readID($id);
                                $imgPath = '..'.DS.'Static'.DS.'produtos'.DS.$res['imagem'];
                                ?>
                                    <div class="row card-columns d-flex flex-wrap justify-content-evenly">
                                            <div class="col-4 vertAlign cartHover">
                                                    <img class="card-img-top mb-2" src="<?= $imgPath ?>" height="140px" width="140px" alt="Card image cap">
                                                    <p class="h5 text-center">
                                                        <?= $res['nome'].' '. $res['marca']?> <?= $res['tamanho'] ?> <br/>R$<?= number_format($res['valor'],2) ?>
                                                    </p>
                                            </div>
                                            <div class="col-4 vertAlign d-flex justify-content-center">
                                                <span class="h2 borderGray mx-1 my-1 px-3 py-2 mr-1"><?= 'x '.$qtd ?></span>
                                            </div>
                                            <div class="col-4 vertAlign d-flex justify-content-center">
                                            <button type="button" class="btn btn-success p-0"  id="btnplus" onclick="aumentarQtd(2,<?= $res['id'] ?>)"><b>
                                                <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                                                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                                                 </svg></b>
                                            </button>
                                                <!-- <button class="btn btn-primary" id="btnminus"><b>-</b></button> -->
                                            <button type="button" class="btn btn-info p-0 ml-1 mr-1" onclick="diminuirQtd(2,<?= $res['id'] ?>)"><b>
                                                <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-dash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M3.5 8a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.5-.5z"/>
                                                </svg>
                                                </svg></b>
                                            </button>

                                            <button type="button" class="btn btn-danger p-0" onclick="removerProd(2,<?= $res['id'] ?>)"><b>
                                                <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"  xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
                                                    <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
                                                </svg></b>
                                            </button>
                                            </div>

                                    </div>
                                <?php
                            }
                        }
                            //Se tal count(acomp) nao for igual a zero
                        if (!$_SESSION['acomp'] == 0){
                            $acpDAO = new acompDAO;
                            foreach ($_SESSION['acomp'] as $id => $qtd) {
                                $res = $acpDAO -> readID($id);
                                $imgPath = '..'.DS.'Static'.DS.'produtos'.DS.$res['imagem'];

                            ?>
                                    <div class="row card-columns d-flex flex-wrap justify-content-evenly">
                                            <div class="col-4 vertAlign cartHover">
                                                    <img class="card-img-top mb-2" src="<?= $imgPath ?>" height="140px" width="140px" alt="Card image cap">
                                                    <p class="h5 text-center">
                                                        <?= $res['nome'].' '.$res['tamanho'] ?><br/> R$<?= number_format($res['valor'],2) ?>
                                                    </p>
                                            </div>
                                            <div class="col-4 vertAlign d-flex justify-content-center">
                                                <span class="h2 borderGray mx-1 my-1 px-3 py-2 mr-1"><?= 'x '.$qtd ?></span>
                                            </div>
                                            <div class="col-4 vertAlign d-flex justify-content-center">
                                            <button type="button" class="btn btn-success p-0"  id="btnplus" onclick="aumentarQtd(3,<?= $res['id'] ?>)"><b>
                                                <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                                                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                                                 </svg></b>
                                            </button>
                                                <!-- <button class="btn btn-primary" id="btnminus"><b>-</b></button> -->
                                            <button type="button" class="btn btn-info p-0 ml-1 mr-1" onclick="diminuirQtd(3,<?= $res['id'] ?>)"><b>
                                                <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-dash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M3.5 8a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.5-.5z"/>
                                                </svg>
                                                </svg></b>
                                            </button>

                                            <button type="button" class="btn btn-danger p-0" onclick="removerProd(3,<?= $res['id'] ?>)"><b>
                                                <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"  xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
                                                    <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
                                                </svg></b>
                                            </button>
                                            </div>

                                    </div>
                        <?php
                            }
                        }
                    }
                    ?>
                </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 text-right flex-nowrap align-right">
                <span id="preco" class="h4 btn-primary disable">R$<?= number_format($_SESSION['preco'], 2) ?></span>
            </div>
        </div>
    </div>
    
    <div class="container mt-2">
        <div class="row flex-nowrap">
            <div class="col-md-6 text-right px-1">
                <button type="button" class="btn btn-lg btn-secondary" data-toggle="modal" data-target="#cancelModal">Cancelar</button>
            </div>
            <div class="col-md-6 text-left px-1">
                <form name="form-finalizar" method="post" action="finalizar.php">
                    <input type="hidden" name="finalizar" value="1"/>
                    <button type="submit" class="btn btn-lg btn-success">Confirmar</button>
                </form>
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

    <?php include "footer.php"; ?>