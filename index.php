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

            class Marido {
                // Propriedade
                public $nome;
                public $esposa;
                
                // Configura a propriedade
                function __construct( $nome = null) {
                    $this->nome   = $nome;
                    $this->esposa;
                }

                public function addEsposa($esposa){
                    $this -> esposa = $esposa;
                }
            }
            
            // Esposa
            class Esposa {
                // Propriedade
                public $nome;
                
                // Configura a propriedade
                function __construct( $nome = null ) {
                    $this->nome = $nome;
                }
            }
            

            // Faz as instâncias
            $esposa = new Esposa('Janaina');

            $marido = new Marido('Leonardo');
            $marido ->addEsposa($espo = new Esposa('Janai'));
            // Leonardo e Janaina
            echo $marido->nome . ' e '. $marido->esposa->nome;
    ?>

</body>
</html>