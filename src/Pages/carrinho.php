<?php

    require_once "./vendor/autoload.php";
use Models\bebidaDAO;
use Models\lancheDAO;

session_start();

$beb = new bebidaDAO;

if (!isset($_SESSION['itens'])){
    $_SESSION['itens'] = [];
}

if (isset($_GET['add']) && $_GET['add'] == "carrinho"){
    $idProduto = $_GET['id'];
    if(!isset($_SESSION['itens'][$idProduto])) {
        $_SESSION['itens'][$idProduto] = 1;
        
    } else {
        $_SESSION['itens'][$idProduto] += 1;
    }
}

if (count($_SESSION['itens']) == 0) {
    echo 'Carrinho Vazio <br/> <a href="test.php"> Adicionar itens</a>'; 
}else {
    echo "<pre";
    var_dump($_SESSION['itens']);
    echo "</pre>";
    foreach ($_SESSION['itens'] as $idProduto => $quantidade) {
        $prods = $beb -> readId($idProduto);
        
        
        echo "Nome: ". $prods[0]['nome']. "<br/>";
        echo "Valor: ". $prods[0]['valor']. "<br/>";
        echo "Quantidade ". $quantidade ."<br/>";
        echo "Total: ". ($prods[0]['valor'] * $quantidade);
        echo '<a href="remover.php?remover=carrinho&&id='. $idProduto.'"> Remover </a>'. "<hr/><br/>"; 
    } 
}

//-----------------------------------------------------------------

    //Modificacoes
if (!isset($_SESSION['lanches'])){

    $_SESSION['lanches'] = [];
    echo "Lanche";

}
    //Modificacoes
if (!isset($_SESSION['acomps'])){

    $_SESSION['acomps'] = [];
    echo "Acompanhamento";
}
    //Modificacoes
if (!isset($_SESSION['bebidas'])){

    $_SESSION['bebidas'] = [];
    echo "Bebida";
}

    //STOPPED HERE
if (isset($_POST['add']) && $_POST['add'] == "carrinho"){
    $idProduto = $_GET['id'];
    if(!isset($_SESSION['itens'][$idProduto])) {
        $_SESSION['itens'][$idProduto] = 1;
        
    } else {
        $_SESSION['itens'][$idProduto] += 1;
    }
}

if (count($_SESSION['itens']) == 0) {
    echo 'Carrinho Vazio <br/> <a href="test.php"> Adicionar itens</a>'; 
}else {
    echo "<pre";
    var_dump($_SESSION['itens']);
    echo "</pre>";
    foreach ($_SESSION['itens'] as $idProduto => $quantidade) {
        $prods = $beb -> readId($idProduto);
        
        
        echo "Nome: ". $prods[0]['nome']. "<br/>";
        echo "Valor: ". $prods[0]['valor']. "<br/>";
        echo "Quantidade ". $quantidade ."<br/>";
        echo "Total: ". ($prods[0]['valor'] * $quantidade);
        echo '<a href="remover.php?remover=carrinho&&id='. $idProduto.'"> Remover </a>'. "<hr/><br/>"; 
    } 
}