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

        $user = new \Classes\Usuario(); //Instancia a classe

        $user -> pedido -> setModoPreparo(true);
        //Comando mais usado para imprimir comandos em php = echo
        //echo "$nome";

        echo $user -> pedido -> __ModoPreparo();

        echo "<hr />";

        class Product{
            public $nome;
            public $valor;

            public function __construct($nome, $valor){
                $this -> nome = $nome;
                $this -> valor = $valor;
            }
        }

        
        $agua = new Product("Agua", 2.50);
        $suco = new Product("Suco", 3.50);

        $products = array($agua, $suco);

        foreach ($products as $array){
            print $array -> valor. "<br />";
            $sum += $array -> valor;
        }

        echo "<br />Soma: ". $sum;
    ?>

</body>
</html>