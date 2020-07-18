    <?php 
        require_once 'vendor/autoload.php'; //Carrega todas as outras classes neste arquivo pelo 'Autoload'

        $promo = new \Classes\Promocao("Black-Friday", 15); //Instancia a classe
        $pedido = new \Classes\Pedido(1, 1); //Instancia a classe

        $lanche = new \Classes\Lanche("Hamburguer", 12.50, ["Pao","Carne","Alface","Tomate"],[1,2,2,2]); //Instancia a classe

        $bebida = new \Classes\Bebida("Cola", 5.40, "Pepsi", "250ml"); //Instancia a classe

        $cupom = new \Classes\Cupom("PW32", 10); //Instancia a classe
        $acomp = new \Classes\Acompanhamento("Batata Frita", 3.10, "Grande"); //Instancia a classe

        ?>
        

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
        <!-- Adicionando arquivo javascript -->
    <script src="index.js"></script>
</head>
<body>
        <div class="Pagina de espera"> 
            <h1>Exemplo de tela de espera</h1>
        </div>
        
        <?php
        echo "<hr />";
        ?>
        
        <?php 
        echo "<hr />";
        ?>


        <?php 

            echo "<hr />";

            $out = '$lanches'; 

        ?>

        <div class="lanches" id="lanches"> 
                <h1>Lanches</h1>
                <form>
                <table>
                    <tr style="text-align: center;">
                        <td> 
                            $lanche
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <input type="image" alt="Hamburguer" id="hamburger" name="hamburger" src="src/Static/hamburguer.png" onclick="" value="" height="250px" width="300px"/>

                        </td>
                    </tr>
                </table>
                <input type="hidden" id="lanche" name="lanche" value=""/>
            </form>
            </div>";
        
        $out = "'$bebida'";
        
        <div class="bebidas" id="bebidas"> 
            <h1>Bebidas</h1>
            <form>
            <table>
                <tr style="text-align: center;">
                    <td> 
                        <?php $bebida ?>
                    </td>
                </tr>
                <tr>
                    <td>
                    <input type="image" alt="Bebida" id="bebida" name="bebida" src="src/Static/bebida.png" onclick="" value="" height="400px" width="300px"/>

                    </td>
                </tr>
            </table>
            <input type="hidden" id="lanche" name="lanche" value=""/>
            </form>
        </div>
        
        <hr />

        <?php 

        $out = "'$acomp'"; 

        ?>

        <div class="bebidas" id="bebidas"> 
            <h1>Bebidas</h1>
            <form>
            <table>
                <tr style="text-align: center;">
                    <td> 
                        $acomp
                    </td>
                </tr>
                <tr>
                    <td>
                    <input type="image" alt="Acompanhamento" id="acompanhamento" name="acompanhamento" src="src/Static/batata-frita.jpg" onclick="" value="" height="400px" width="300px"/>
                    
                    </td>
                </tr>
            </table>
            <input type="hidden" id="acompanhamento" name="acompanhamento" value=""/>
        </form>
        </div>";

    <?php 

        $pedido -> setMetodoPagamento($_GET['metodoPagamento']);
        $pedido -> setModoPreparo($_GET['modoPreparo']);

        echo $lanche -> getRecipeString();
        echo "<br />";
        echo $lanche -> getIngredientString();

    ?>

</body>
</html>