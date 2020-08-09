<?php

    require_once dirname(__DIR__, 2)."/vendor/autoload.php";
    use Models\bebidaDAO;
    use Models\lancheDAO;

session_start();

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

if (isset($_GET['carrinho']) && $_GET['carrinho'] == '1'){
    $idProduto = $_GET['id'];
    echo "Id produto: $idProduto";
    if(isset($_GET['type']) && $_GET['type'] == 1){

        if(isset($_GET['lanches'][$idProduto])){
            $_SESSION['lanches'][$idProduto] = 1;
        } else {
            $_SESSION['lanches'][$idProduto] += 1;
        }
    }

    if(isset($_GET['type']) && $_GET['type'] == 2){

        if(isset($_GET['bebidas'][$idProduto])){
            $_SESSION['bebidas'][$idProduto] = 1;
        } else {
            $_SESSION['bebidas'][$idProduto] += 1;
        }
    }

    if(isset($_GET['type']) && $_GET['type'] == '3'){
        echo "<br/>Acomp flag<br/>";
        if(isset($_GET['type'][$idProduto])){
            $_SESSION['acomp'][$idProduto] = 1;
        } else {
            $_SESSION['acomp'][$idProduto] += 1;
        }
    }
}
//     //Modificacoes
// if (!isset($_SESSION['lanches'])){

//     $_SESSION['lanches'] = [];
//     echo "Lanche";

// }
//     //Modificacoes
// if (!isset($_SESSION['acomps'])){

//     $_SESSION['acomps'] = [];
//     echo "Acompanhamento";
// }
//     //Modificacoes
// if (!isset($_SESSION['bebidas'])){

//     $_SESSION['bebidas'] = [];
//     echo "Bebida";
// }

//     //STOPPED HERE
// if (isset($_POST['add']) && $_POST['add'] == "carrinho"){
//     $idProduto = $_GET['id'];
//     if(!isset($_SESSION['itens'][$idProduto])) {
//         $_SESSION['itens'][$idProduto] = 1;
        
//     } else {
//         $_SESSION['itens'][$idProduto] += 1;
//     }
// }
        //Checa a lista de lanches, se tiver mais que 0   
if (count($_SESSION['lanches']) == 0) {
    echo '<br/>Nenhum lanche.<br/>'; 
}else {
    echo "<br/>Lanches:<br/>";
    echo "<pre>";
    var_dump($_SESSION['lanches']);
    echo "</pre>";
    // foreach ($_SESSION['itens'] as $idProduto => $quantidade) {
    //     $prods = $beb -> readId($idProduto);
        
        
    //     echo "Nome: ". $prods[0]['nome']. "<br/>";
    //     echo "Valor: ". $prods[0]['valor']. "<br/>";
    //     echo "Quantidade ". $quantidade ."<br/>";
    //     echo "Total: ". ($prods[0]['valor'] * $quantidade);
    //     echo '<a href="remover.php?remover=carrinho&&id='. $idProduto.'"> Remover </a>'. "<hr/><br/>"; 
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

    echo "<br/><a href=\"/pedido.php\">Voltar</a>";