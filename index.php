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

        $product = new \Classes\Produto(); //Instancia a classe

        $product -> setNome("Pedro"); //Usando o metodo SET da classe produto

        print($product -> getNome()); //Usa o metodo GET para imprimir o valor inserido no metodo SET "Pedro"

        //Comando mais usado para imprimir comandos em php = echo
        //echo "$nome";
    ?>
</body>
</html>