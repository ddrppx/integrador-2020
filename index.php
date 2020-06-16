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

        $product = new \Classes\Produto('Agua', '10.20', 10); //Instancia a classe

        //Comando mais usado para imprimir comandos em php = echo
        //echo "$nome";

        echo $product;
        echo "<hr>";

        $floats = array(1.23, 2.43, 5.43, 6.21);

        echo "<br />". array_sum(($floats));
    ?>

</body>
</html>