<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Método de Pagamento</title>
	
    <link rel="stylesheet" href="../css/main.css" />
	<link rel="stylesheet" href="../bootstrap4.5.0/css/bootstrap.min.css" />
</head>
<body>

	<?php include "header.php"; ?>

	<div class="container pt-5 pb-2">
			<div class="row pt-5 pb-2">
				<div class="col-xl text-center pt-5">
					<h1>Como deseja que o produto seja preparado?</h1>
				</div>
			</div>
        </div>

        <form name="form" method="post" action="pagamento.php">

        <div class="container pt-2 pb-5 optionHover" >
			<div class="row pt-2 pb-5 text-center">
                <div class="col-md mx-4" id="opt">
                    <h2>Comer aqui</h2>
                        <!-- Comer aqui -->
                    <div class="text-center" onclick="sendSubmit('preparo', 0)">
                        
                        <img class="img-fluid" src="../Static/comer-aqui.png" class="rounded" alt="Comer no estabelecimento" title="" height="auto" width="100%">
                    </div>
                    
				</div> </a>
                <div class="col-md mx-4" id="opt">
					<h2>Para viagem</h2>
                        <!-- Levar para viagem -->
                    <div class="text-center" onclick="sendSubmit('preparo', 1)">
                        <img id="opt" class="img-fluid" src="../Static/para-viagem.png" class="rounded" alt="Levar para viagem" height="auto" width="100%"> 
                    </div>
                </div>
	        </div>
        </div>
        
        <input type="hidden" id="preparo" name="preparo" value="">

        </form>
		
		<div class="container">
            <div class="row">
                <div class="col text-right">
                    Ícones por: <a href="https://www.flaticon.com/authors/iconixar" title="iconixar">iconixar</a>, <a href="https://www.flaticon.com/authors/pause08" title="Pause08">Pause08</a> e <a href="https://www.flaticon.com/authors/google" title="Google">Google</a>.
                </div>
            </div>
        </div>
	
	<?php include "footer.php"; ?>