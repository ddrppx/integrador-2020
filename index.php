<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
</head>
<body>
    <?php
        require_once 'vendor/autoload.php'; //Carrega todas as outras classes neste arquivo pelo 'Autoload'

        $promo = new \Classes\Promocao("Black-Friday", 15); //Instancia a classe
        $pedido = new \Classes\Pedido(1, 1); //Instancia a classe
        
        $lanche = new \Classes\Lanche("Hamburguer", 12.50, ["Pao","Carne","Alface"]); //Instancia a classe
        
        $bebida = new \Classes\Bebida("Cola", 5.40, "Pepsi", "250ml"); //Instancia a classe

        $cupom = new \Classes\Cupom("PW32", 10); //Instancia a classe
        $acomp = new \Classes\Acompanhamento("Batata Frita", 3.10, "Grande"); //Instancia a classe

        echo "<h1>Classe Cupom </h1><br />";
        echo $cupom;
        echo "<br />";

        echo "<h1>Classe Promocao </h1><br />";
        echo $promo;
        echo "<br />";

        echo "<h1>Classe Lanche </h1><br />";
        //echo $lanche;
        $lanche -> addPromocao($promo);
        echo $lanche;
        echo "<br />";

        echo "<h1>Classe Bebida </h1><br />";
        //$bebida -> addPromocao($promo);
        echo $bebida;
        echo "<br />";

        echo "<h1>Classe Acompanhamento</h1><br />";
        $acomp -> addPromocao($promo);
        echo $acomp;
        $acomp -> remPromocao();
        echo $acomp;
        echo "<br />";

        echo "<h1>Classe Pedido </h1><br />";
        echo $pedido;
        $pedido -> addProduto($lanche);
        $pedido -> addProduto($bebida);
        $pedido -> addProduto($acomp);
        echo "<br />";
    ?>

</body>
</html>