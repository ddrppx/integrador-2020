<?php
    require "../../../vendor/autoload.php";
    
    if(isset($_POST['submit'])){

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="../../css/main.css" />
    <link rel="stylesheet" href="../../bootstrap4.5.0/css/bootstrap.min.css" />
</head>
<body class="text-center">

            <div class="container">
                <div class="container">
                    <div class="row flex-nowrap">
                        <div class="col-md-4" id="geolocation">
                    </div>
					<div class="col-md-4 text-center" id="div-clock">
						<span class="h5 clock-container col text-center" id="clock"></span>
					</div>
					<div class="col-md-4 text-right">
						<!-- Ícone Linguagem -->
						<img type="image/svg+xml" src="../../Static/svg/brazil.svg" height="30px" width="30px"/>
						<!-- Ícone Wi-Fi -->
						<img type="image/svg+xml" src="../../Static/svg/import.svg" height="30px" width="30px"/>
					</div>
				</div>
			</div>

    <div class="container" id="centralized">
        <div class="row d-flex justify-content-center">
            
        <form class="form-signin">
            <img class="mb-4" src="../../Static/autoatendimento.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Efetue o login</h1>
            <input type="email" id="inputEmail" class="form-control" placeholder="Login" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
            <div class="checkbox mb-3">
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
        </form>
        
        </div>
    </div>

    <div class="container">
            <div class="row">
                <div class="col text-right">
                    Ícones por: <a href="https://www.flaticon.com/authors/iconixar" title="iconixar">iconixar</a>, <a href="https://www.flaticon.com/authors/pause08" title="Pause08">Pause08</a> e <a href="https://www.flaticon.com/authors/google" title="Google">Google</a>.
                </div>
            </div>
        </div>

        <div class="container">
                    <div class="row">
                <div class="col text-center">
                  <img class="mb-1" src="../../Static/autoatendimento.png" height="30px" width="30px" />&nbsp;Autoatendimento &copy; 2020
                </div>
              </div>
        </div>
      </div>
     <!-- CDN Ajax/JQuery -->
    <script src="../..//javascript/jquery.min.js"></script>
    <!-- CDN Popper.js (Bootstrap) -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Bootstrap js -->
    <script src="../../bootstrap4.5.0\js\bootstrap.min.js"></script>
    <!-- Relógio topo -->
    <script src="../../javascript\relogio.js"></script>
    <!-- Geolocalização -->
    <!-- <script src="..\javascript\geolocation.js"></script> -->
    <!-- Arquivo javascript -->
		<script src="../../javascript\main.js"></script>
  </body>
 </html>