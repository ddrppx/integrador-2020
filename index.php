<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
</head>
<body>
    <?php
        // require_once 'vendor/autoload.php'; //Carrega todas as outras classes neste arquivo pelo 'Autoload'

        // $product = new \Classes\Produto(); //Instancia a classe

        // $product -> setNome("Pedro"); //Usando o metodo SET da classe produto

        // print($product -> getNome()); //Usa o metodo GET para imprimir o valor inserido no metodo SET "Pedro"

        // //Comando mais usado para imprimir comandos em php = echo
        // //echo "$nome";

        class Pedro {
            private $nome;
            private $idade;
            
            public function __toString() {
                return "Nome: ". $this -> nome. "<br />".
                "Idade: ". $this -> idade;
            }

            public function values() {
                $this -> nome = "Pedro";
                $this -> idade = "22";
            }
        }

        $obj = new Pedro();
        $obj -> values();

        echo $obj;
    ?>
</body>
</html>