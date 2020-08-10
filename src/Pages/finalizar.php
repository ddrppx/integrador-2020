<?php

use Classes\Pedido;

require_once "../../vendor/autoload.php";
    session_start();

    $pedido = new Pedido($_SESSION['preparo'],$_SESSION['pagamento'],$_SESSION['preco']);

    echo $pedido;

        // unset($_SESSION['inexistente']);
        // unset($_SESSION['preparo']);
        // unset($_SESSION['pagamento']);
        // unset($_SESSION['categoria']);
        // unset($_SESSION['preco']);
        // unset($_SESSION['lanches']);
        // unset($_SESSION['bebidas']);
        // unset($_SESSION['acomp']);
?>