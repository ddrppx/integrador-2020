<?php

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Método de Pagamento</title>
	
	<link rel="stylesheet" href="../bootstrap4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/main.css" />

</head>
<body>

    <?php include "header.php"; ?>

    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2>Text</h2>
            </div>
        </div>
    </div>

    <div class="container my-2">
        <div class="row">

            <!-- Container Lateral -->
            <div class="col-sm-12 col-md-3" id="lateral-categoria">

            <div class="card">
                <div class="card-body">
                    <p class="card-title">Lanches</p>
                    <img class="card-img-bottom" src="../static/svg/segment/lanches.svg" alt="Card image cap">
                </div>
                
                </div>

                <div>
                    <h4>Lanches</h4>
                    <img type="image/svg+xma" src="../static/svg/segment/lanches.svg"  height="150px" width="100%"/>
                </div>
                

                <form id="formulario_filme">
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" name="titulo" class="form-control" id="titulo"/>
                    </div>
                
                    <div class="form-group">
                        <label for="imagem">Foto</label>
                        <input type="text" name="imagem" class="form-control" id="imagem"/>
                    </div>
                
                    <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <select name="categorias" class="form-control" id="categorias" multiple>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>

            </div>

            <!-- Container -->
            <div class="col-sm-12 col-md-9">
            <div id="cards_container" class="card-columns">
            
            <div class="card-body">
                <img class="card-img-top" src="../static/svg/segment/lanches.svg" height="100px" height="100px" alt="">
            </div>
            
            
            <div class="card">
                <img class="card-img-top" src="../static/svg/segment/lanches.svg" height="100px" height="100px" alt="">
                </div>
            
            <div class="card">
                <img class="card-img-top" src="../static/svg/segment/lanches.svg" height="100px" height="100px" alt="">
                </div>
            
            <div class="card">
                <img class="card-img-top" src="../static/svg/segment/lanches.svg" height="100px" height="100px" alt="">
                </div>
            
            <div class="card">
                <img class="card-img-top" src="../static/svg/segment/lanches.svg" height="100px" height="100px" alt="">
                </div>
        
        </div>
        


            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
            
                
            </div>
            <div class="col-xl-12">
                Itens
            </div>
        </div>
    </div>

    
    
    <?php include "footer.php"; ?>