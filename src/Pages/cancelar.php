<?php
    session_start();
    
    if ($_GET['cancelar'] && $_GET['cancelar'] == 1) {
        //     //Destrói as variaveis de sessao usadas/existentes
        // unset($_SESSION['inexistente']);
        // unset($_SESSION['preparo']);
        // unset($_SESSION['pagamento']);
        // unset($_SESSION['categoria']);
        // unset($_SESSION['preco']);
        // unset($_SESSION['lanches']);
        // unset($_SESSION['bebidas']);
        // unset($_SESSION['acomp']);

        session_unset();
        session_destroy();
        session_write_close();
        setcookie(session_name(),'',0,'/');
        session_regenerate_id(true);
    }

    clearstatcache();
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../../index.php">';
?>