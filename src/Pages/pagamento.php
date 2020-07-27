<?php
    session_start();
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

        <div class="container pt-5 pb-2">
			<div class="row pt-5 pb-2">
				<div class="col-xl text-center pt-5">
					<h1>Como deseja fazer o pagamento?</h1>
				</div>
			</div>
        </div>

        <form name="form" method="get" action="preparo.php">

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

        <div class="container">
            <div class="row">
                <div class="col text-right">
                    Ícones por: <a href="https://www.flaticon.com/authors/iconixar" title="iconixar">Iconixar</a>, <a href="https://www.flaticon.com/authors/pause08" title="Pause08">Pause08</a>, <a href="https://www.flaticon.com/authors/google" title="Google">Google</a>.
                </div>
            </div>
        </div>

        <?php include "footer.php"; ?>