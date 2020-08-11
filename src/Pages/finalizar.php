<?php
    require_once "../../vendor/autoload.php";
    
    use Classes\Pedido;
    use Models\pedidoDAO;
    use Models\lancheDAO;
    use Models\bebidaDAO;
    use Models\acompDAO;
    
    session_start();
        //Checa variavel de sessao do preparo
    if (isset($_SESSION['preparo'])){
        $prep = $_SESSION['preparo'];
    }
        //Checa variavel de sessao do pagamento
    if(isset($_SESSION['pagamento'])){
        $pag = $_SESSION['pagamento'];
    }
        //Checa variavel de sessao do preco
    if(isset($_SESSION['preco'])){
        $preco = $_SESSION['preco'];
    }
        //Checa variavel de sessao que contem os lanches
    if(isset($_SESSION['lanches'])){
        $lanches = $_SESSION['lanches'];
        foreach ($lanches as $key => $value) {
        }
    }
        //Checa variavel de sessao que contem as bebidas
    if(isset($_SESSION['bebidas'])){
        $bebidas = $_SESSION['bebidas'];
        foreach($bebidas as $key => $value) {
        }
    }
        //Checa variavel de sessao que contem os acompanhamentos
    if(isset($_SESSION['acomp'])){
        $acomp = $_SESSION['acomp'];
        foreach($acomp as $key => $value) {
        }
    }
        //Checa se tem o parametro finalizar do metodo POST (para finalizar o pedido)
    if (isset($_POST['finalizar']) && $_POST['finalizar'] == 1){
            //Checa se existem as tais variaveis
        if(isset($prep, $pag, $preco)){
            $pedido = new pedidoDAO;
            $pedido = new Pedido($prep, $pag, $preco);
                //Instancia o pedidoDAO
            $DBwrite = new pedidoDAO;
                //Escreve na tabela pedidos e retorna o id do pedido atual
            $insertedID = $DBwrite -> createSingle($pedido);
                //Checa se existem dados na variavel lanches
            if (count($lanches) > 0){
                    //Percorre todo o array lanches, escrevendo cada um no banco (Tabela pedido_lanche)
                foreach ($lanches as $id => $qtd) {
                   $DBwrite -> insertPedidoLanche($insertedID, $id, $qtd);
                }
            }
                //Checa se existem dados na variavel bebidas
            if (count($bebidas) > 0){
                    //Percorre todo o array bebidas, escrevendo cada um no banco (Tabela pedido_bebida)
                foreach ($bebidas as $id => $qtd) {
                   $DBwrite -> insertPedidoBebida($insertedID, $id, $qtd);
                }
            }
                //Checa se existem dados na variavel acompanhamentos
            if (count($acomp) > 0){
                    //Percorre todo o array bebidas, escrevendo cada um no banco (Tabela pedido_acompanhamentos)
                foreach ($acomp as $id => $qtd) {
                   $DBwrite -> insertPedidoAcomp($insertedID, $id, $qtd);
                }
            }

            ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Finalizar</title>
                
            <link rel="stylesheet" href="../css/main.css" />
            <link rel="stylesheet" href="../bootstrap4.5.0/css/bootstrap.min.css" />
        </head>
        <body>
            <?php include_once "header.php" ?>
            
            <div class="container" id="centralized">
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="h1">Pedido finalizado!</p>
                    </div>
                    <div class="col-12 text-center">
                        <svg width="8em" height="8em" viewBox="0 0 16 16" class="bi bi-bag-check text-success" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14 5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V5zM1 4v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4H1z"/>
                            <path d="M8 1.5A2.5 2.5 0 0 0 5.5 4h-1a3.5 3.5 0 1 1 7 0h-1A2.5 2.5 0 0 0 8 1.5z"/>
                            <path fill-rule="evenodd" d="M10.854 7.646a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 10.293l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        </svg>
                    </div>
                    <div class="col-12 text-center">
                        <p class="h1">Obrigado pela preferência! <br/> Tenha um Bom dia!</p>
                    </div>
                </div>
            </div>

            <?php include_once "footer.php" ?>
        </body>
        </html>

            <?php
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="7;URL=/cancelar.php">';
        }
    }
?>
