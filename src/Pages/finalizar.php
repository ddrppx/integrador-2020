<?php
    require_once "../../vendor/autoload.php";
    
    use Classes\Pedido;
    use Models\pedidoDAO;
    use Models\lancheDAO;
    use Models\bebidaDAO;
    use Models\acompDAO;
    
    session_start();

    if (isset($_SESSION['preparo'])){
        $prep = $_SESSION['preparo'];
        echo "<br/>$prep<br/>";
    }
    
    if(isset($_SESSION['pagamento'])){
        $pag = $_SESSION['pagamento'];
        echo "<br/>$prep<br/>";
    }
    
    if(isset($_SESSION['preco'])){
        $preco = $_SESSION['preco'];
        echo "<br/>$preco<br/>";
    }

    if(isset($_SESSION['lanches'])){
        $lanches = $_SESSION['lanches'];
        foreach ($lanches as $key => $value) {
            echo "$key -> $value<br/>";
        }
    }

    if(isset($_SESSION['bebidas'])){
        $bebidas = $_SESSION['bebidas'];
        foreach($bebidas as $key => $value) {
            echo "$key -> $value<br/>";
        }
    }

    if(isset($_SESSION['acomp'])){
        $acomp = $_SESSION['acomp'];
        foreach($acomp as $key => $value) {
            echo "$key -> $value<br/>";
        }
    }

        // unset($_SESSION['inexistente']);
        // unset($_SESSION['preparo']);
        // unset($_SESSION['pagamento']);
        // unset($_SESSION['categoria']);
        // unset($_SESSION['preco']);
        // unset($_SESSION['lanches']);
        // unset($_SESSION['bebidas']);
        // unset($_SESSION['acomp']);
    if (isset($_POST['finalizar']) && $_POST['finalizar'] == 1){
        if(isset($prep, $pag, $preco)){
            echo "<br/>Preparo, Pagamento e Preço, check.<br/>";
            $pedido = new pedidoDAO;
            $pedido = new Pedido($prep, $pag, $preco);

            $DBwrite = new pedidoDAO;
            $insertedID = $DBwrite -> createSingle($pedido);

            echo "Inserted id: $insertedID";
            if (count($lanches) > 0){
                echo "Lanches: ";
                print_r($lanches);
                echo "<br/>";

                foreach ($lanches as $id => $qtd) {
                   $DBwrite -> insertPedidoLanche($insertedID, $id, $qtd);
                }
            }

            if (count($bebidas) > 0){
                echo "Bebidas: ";
                print_r($bebidas);
                echo "<br/>";

                foreach ($bebidas as $id => $qtd) {
                   $DBwrite -> insertPedidoBebida($insertedID, $id, $qtd);
                }
            }

            if (count($acomp) > 0){
                echo "Acomps: ";
                print_r($acomp);
                echo "<br/>";

                foreach ($bebidas as $id => $qtd) {
                   $DBwrite -> insertPedidoAcomp($insertedID, $id, $qtd);
                }
            }

            echo "</br><h3>Finished.</h3>";
        }
    }
?>