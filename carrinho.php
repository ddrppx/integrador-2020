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
        $_SESSION['itens'][$idProduto]['classe'] = "Lanche";
        
    } else {
        $_SESSION['itens'][$idProduto] += 1;
    }
}

    echo "<pre>";
    print_r($_SESSION['itens']);
    echo "</pre>";

if (count($_SESSION['itens']) == 0) {
    echo 'Carrinho Vazio <br/> <a href="test.php"> Adicionar itens</a>'; 
}else {
    foreach ($_SESSION['itens'] as $idProduto => $quantidade) {
        $prods = $beb -> readId($idProduto);
        
        echo "Nome: ". $prods[0]['nome']. "<br/>";
        echo "Valor: ". $prods[0]['valor']. "<br/>";
        echo "Quantidade ". $quantidade ."<br/>";
        echo "Total: ". ($prods[0]['valor'] * $quantidade);
        echo '<a href="remover.php?remover=carrinho&&id='. $idProduto.'"> Remover </a>'. "<hr/><br/>"; 
    } 
}