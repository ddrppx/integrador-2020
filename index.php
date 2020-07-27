
<!DOCTYPE html>
<html lang="pt-br">
	<head>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<title>Página principal</title>

		<link rel="stylesheet" href="src/bootstrap4.5.0/css/bootstrap.min.css" />
		<link rel="stylesheet" href="src/css/main.css" />
		
	</head>

	<body onclick="iniciarPedido()">
		<div class="container" >
			<div class="row flex-nowrap">
				<div class="col-sm-4" id="geolocation">
				</div>
				<div class="col-sm-4 text-center" id="div-clock">
					<span class="clock-container col text-center" id="clock"></span>
				</div>
				<div class="col-sm-4 text-right">
					<!-- Ícone Linguagem -->
					<img type="image/svg+xml" src="src/Static/svg/brazil.svg" height="30px" width="30px"/>
					<!-- Ícone Wi-Fi -->
					<img type="image/svg+xml" src="src/Static/svg/import.svg" height="30px" width="30px"/>
				</div>
			</div>
		</div>

		<div class="container pt-5 pb-5">
			<div class="row pt-5 pb-5">
				<div class="col-xl text-center pt-4 pb-4">
					<h1>Bem vindo(a)!</h1>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row pt-5 pb-5">
				<div class="col-xl-12 text-center pb-5">
					<h2>
						Você será atendido aqui.
					</h2>
				</div>
				<div class="col-xl text-center ">
					<h2>
						Clique na tela e comece a fazer o seu pedido!
					</h2>
					<img class="img-fluid" src="src/Static/interactive.png" heigh="200px" width="250px">
				</div>
			</div>
		</div>

		<div class="container">
            <div class="row">
                    <div class="col text-right mt-1">
                    Ícones por: <a href="https://www.flaticon.com/authors/google" title="Google">Google</a>, <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> e <a href="https://www.flaticon.com/authors/pause08" title="Pause08">Pause08</a>.
                </div>
            </div>
		</div>
		
		<div class="container">
            <div class="row">
				<div class="col text-center">
					<img class="mb-1" src="src/Static/autoatendimento.png" height="30px" width="30px" />&nbsp;Autoatendimento - Todos direitos reservados.
				</div>
			</div>
		</div>

	<!-- Main JS -->
	<script src="/src/javascript/main.js"></script>
	<!-- CDN Ajax -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- CDN Popper.js (Bootstrap) -->
	<script src="https://unpkg.com/@popperjs/core@2"></script>
	<!-- Bootstrap js -->
	<script src="src/bootstrap4.5.0/js/bootstrap.min.js"></script>
	<!-- Relógio topo -->
	<script src="src/javascript/relogio.js"></script>
	<!-- Geolocalização -->
	<script src="src/javascript/geolocation.js"></script>
	</body>
</html>