<?php

    require_once dirname(__DIR__, 2)."/vendor/autoload.php";

    use Models\acompDAO;
    use Models\bebidaDAO;
    use Models\lancheDAO;

session_start();
    $lanche = new lancheDAO;
    $bebida = new bebidaDAO;
    $acomp = new acompDAO;
    

        //-----Carrinho-----
    //Se nao existir SESSION['lanches']
    if (!isset($_SESSION['lanches'])){
        $_SESSION['lanches'] = [];
        
    }
    
    //Se nao existir SESSION['bebidas']
    if (!isset($_SESSION['bebidas'])){
        $_SESSION['bebidas'] = [];
    }
    
        //Se nao existir SESSION['acomp']
    if (!isset($_SESSION['acomp'])){
        $_SESSION['acomp'] = [];
    }
    
        //Checa se os parametros foram passados
    if (isset($_GET['carrinho']) && $_GET['carrinho'] == '1'){
        $idProduto = $_GET['id'];

        //Se o tipo passado como parametro for 1 = Lanche
        if(isset($_GET['type']) && $_GET['type'] == 1){
            
            if(isset($_GET['lanches'][$idProduto])){
                $_SESSION['lanches'][$idProduto] = 1;
            } else {
                $_SESSION['lanches'][$idProduto] += 1;
            }
        }
        
        //Se o tipo passado como parametro for 1 = Bebida
        if(isset($_GET['type']) && $_GET['type'] == 2){
            
            if(isset($_GET['bebidas'][$idProduto])){
                $_SESSION['bebidas'][$idProduto] = 1;
            } else {
                $_SESSION['bebidas'][$idProduto] += 1;
            }
        }
        
        //Se o tipo passado como parametro for 1 = Acompanhamentos
        if(isset($_GET['type']) && $_GET['type'] == '3'){
            if(isset($_GET['type'][$idProduto])){
                $_SESSION['acomp'][$idProduto] = 1;
            } else {
                $_SESSION['acomp'][$idProduto] += 1;
            }
        }
    }

        //Checa a lista de bebidas, se tiver mais que 0
    if (count($_SESSION['bebidas']) == 0) {
        echo '<br/>Nenhuma bebida.<br/>';
    } else {
        echo "<br/>Bebidas:<br/>";
        echo "<pre>";
        var_dump($_SESSION['bebidas']);
        echo "</pre>";
        echo "<br/>";
    }

        //Checa a lista de acompanhamentos, se tiver mais que 0
    if (count($_SESSION['acomp']) == 0) {
        echo '<br/>Nenhuma bebida.<br/>';
    } else {
        echo "<br/>Acompanhamentos:<br/>";
        echo "<pre>";
        var_dump($_SESSION['acomp']);
        echo "</pre>";
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

    clearstatcache();

    ?>