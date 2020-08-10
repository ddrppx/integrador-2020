<?php

    require_once dirname(__DIR__, 2)."/vendor/autoload.php";
    use Models\acompDAO;
    use Models\bebidaDAO;
    use Models\lancheDAO;

    session_start();

    //Classes (Models) sendo instanciadas
    $lanche = new lancheDAO;
    $bebida = new bebidaDAO;
    $acomp = new acompDAO;
    
    $origem = $_SESSION['origem'];
        //Test
    if (!isset($_GET['type'])){
        $_GET['type'] = 1;
    }
        //-----Carrinho-----
    if(isset($_GET['remover']) && $_GET['remover'] == '1') {
        $idProduto = $_GET['id'];
            //Se o tipo passado como parametro for 1 = Lanche
        if(isset($_GET['type']) && $_GET['type'] == '1'){
            
            if(isset($_SESSION['lanches'][$idProduto])){
                unset($_SESSION['lanches'][$idProduto]);
            }
        }
        
            //Se o tipo passado como parametro for 1 = Bebida
        if(isset($_GET['type']) && $_GET['type'] == '2'){
            
            if(isset($_SESSION['bebidas'][$idProduto])){
                unset($_SESSION['bebidas'][$idProduto]);
            }
        }
        
            //Se o tipo passado como parametro for 1 = Acompanhamentos
        if(isset($_GET['type']) && $_GET['type'] == '3'){
            
            if(isset($_SESSION['acomp'][$idProduto])){
                unset($_SESSION['acomp'][$idProduto]);
            }
        }
    }

        //Checa se os parametros foram passados
    if (isset($_GET['carrinho']) && $_GET['carrinho'] == '1'){
        $idProduto = $_GET['id'];

        //Se o tipo passado como parametro for 1 = Lanche
        if(isset($_GET['type']) && $_GET['type'] == '1'){
            
            if(!isset($_SESSION['lanches'][$idProduto])){
                $_SESSION['lanches'][$idProduto] = 1;
            } else {
                $_SESSION['lanches'][$idProduto] += 1;
            }
        }

            //Se o tipo passado como parametro for 1 = Bebida
        if(isset($_GET['type']) && $_GET['type'] == '2'){
                //Se o item nao existir no carrinho ele cria
            if(!isset($_SESSION['bebidas'][$idProduto])){
                $_SESSION['bebidas'][$idProduto] = 1;
            } else {
                    //Se ele existir, adiciona a quantidade
                $_SESSION['bebidas'][$idProduto] += 1;
            }
        }

        //Se o tipo passado como parametro for 1 = Acompanhamentos
        if(isset($_GET['type']) && $_GET['type'] == '3'){
            if(!isset($_SESSION['acomp'][$idProduto])){
                $_SESSION['acomp'][$idProduto] = 1;
            } else {
                    //Se ele existir, adiciona a quantidade
                $_SESSION['acomp'][$idProduto] += 1;
            }
        }
    }

        //Checa se os parametros foram passados
    if (isset($_GET['diminuir']) && $_GET['diminuir'] == '1'){
        $idProduto = $_GET['id'];

            //Se o tipo passado como parametro for 1 = Lanche
        if(isset($_GET['type']) && $_GET['type'] == '1'){
                //Checa se o produto existe, e se é maior que 0
            if(isset($_SESSION['lanches'][$idProduto]) && $_SESSION['lanches'][$idProduto] > 0){
                $_SESSION['lanches'][$idProduto] -= 1;
            } else { //Se nao for maior que 0, o produto é tirado do carrinho apos apertar diminuir
                 unset($_SESSION['lanches'][$idProduto]);    
            }
        }
                
            //Se o tipo passado como parametro for 1 = Bebida
        if(isset($_GET['type']) && $_GET['type'] == '2'){

            if(isset($_SESSION['bebidas'][$idProduto]) && $_SESSION['bebidas'][$idProduto] < 0){
                $_SESSION['bebidas'][$idProduto] -= 1;
            } else {
                unset($_SESSION['bebidas'][$idProduto]);
            }

                //Checa se o produto existe, e se é maior que 0
            if(isset($_SESSION['acomp'][$idProduto]) && $_SESSION['bebidas'][$idProduto] > 0){
                $_SESSION['acomp'][$idProduto] -= 1;
            } else { //Se nao for maior que 0, o produto é tirado do carrinho apos apertar diminuir
                 unset($_SESSION['acomp'][$idProduto]);    
            }
        }
                
            //Se o tipo passado como parametro for 1 = Acompanhamentos
        if(isset($_SESSION['type']) && $_GET['type'] == '3'){
            $_SESSION['acomp'][$idProduto] -= 1;

                //Checa se o produto existe, e se é maior que 0
            if(isset($_SESSION['acomp'][$idProduto]) && $_SESSION['acomp'][$idProduto] > 0){
                $_SESSION['acomp'][$idProduto] -= 1;
            } else { //Se nao for maior que 0, o produto é tirado do carrinho apos apertar diminuir
                 unset($_SESSION['acomp'][$idProduto]);    
            }
        }
    }

        //Calculo do valor do pedido
    $valor = 0;

    $lanches = $_SESSION['lanches']; 
    foreach ($lanches as $id => $quantidade) {
        $res = $lanche -> readValor($id);
        $valor+= $res['valor'] * $quantidade;
    }
    
    $bebidas = $_SESSION['bebidas'];
    foreach ($bebidas as $id => $quantidade) {
        $res = $bebida -> readValor($id);
        $valor+= $res['valor'] * $quantidade;
        // $res = $res * $quantidade;
    }
    
    $acomps = $_SESSION['acomp'];
    foreach ($acomps as $id => $quantidade) {
        $res = $acomp -> readValor($id);
        $valor+= $res['valor'] * $quantidade;
    }

    $_SESSION['preco'] = $valor;

    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>";

    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL='.$origem.'">';
    ?>