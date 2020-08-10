<?php
    session_start();
        //Destroi as variaveis armazenando dados da sessao
        //e retorna o usuario à pagina inicial
    if ($_GET['cancelar'] && $_GET['cancelar'] == 1) {
        session_unset();
        session_destroy();
        session_write_close();
        setcookie(session_name(),'',0,'/');
    }

    clearstatcache();
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../../index.php">';
?>