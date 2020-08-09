<?php
    session_start();

    $errors = [];
    
    if(isset($_POST)){
        $_SESSION['preparo'] = $_POST['preparo'];
    } else {
        $errors[] = "Post preparo não foi recebido";
    }

    $_SESSION['errors'] = $errors;

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<title>Página principal</title>

        <link rel="stylesheet" href="../bootstrap4.5.0/css/bootstrap.min.css" />
        
        <link rel="stylesheet" href="../css/main.css" />

        <link rel="stylesheet" href="../bootstrap4.5.0/css/bootstrap.min.css" />        
		
	</head>

	<body>
        <?php include "header.php"; ?>
        <div class="container">
            <div class="row text-left">
            <button class="btn btn-secondary" id="pedido-voltar" onclick="voltarPreparo()">
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M7.854 4.646a.5.5 0 0 1 0 .708L5.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z"/>
                       <path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h6.5a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                    Voltar</button>
            </div>
        </div>
        <div class="container pt-5 pb-2">
			<div class="row pt-5 pb-2">
				<div class="col-xl text-center pt-5">
					<h1>Como deseja fazer o pagamento?</h1>
				</div>
			</div>
        </div>

        <form name="form" method="post" action="pedido.php">

        <div class="container pt-2 pb-5">
			<div class="row pt-2 pb-5 text-center">
                <div class="col-md mx-4 itemHover">
                    <h2>Dinheiro</h2>
                        <!-- Pagamento em Dinheiro -->
                    <div class="text-center" onclick="sendSubmit('pagamento', 0)">
                        <img id="opt" src="../Static/money.png" class="rounded" alt="Linguagem: PT-BR" alt="Pagamento em dinheiro" title="" width="100%">
                    </div>
                </div>
                <div class="col-md mx-4 itemHover">
                    <h2>Cartão</h2>
                        <!-- Pagamento no Cartão -->
                    <div class="text-center" onclick="sendSubmit('pagamento', 1)">
                        <img id="opt" src="../Static/cartao-credito.png" class="rounded" alt="Pagamento no cartão de crédito" width="100%"> 
                    </div>

                </div>
	        </div>
        </div>

        <input type="hidden" id="pagamento" name="pagamento" value=""/>

        </form>

        <?php 
            include "footer.php";
        ?>