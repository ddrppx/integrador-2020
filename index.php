<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
        <!-- Adicionando arquivo javascript -->
    <script src="index.js"></script>
</head>
<body>
    <?php
        require_once 'vendor/autoload.php'; //Carrega todas as outras classes neste arquivo pelo 'Autoload'

        $promo = new \Classes\Promocao("Black-Friday", 15); //Instancia a classe
        $pedido = new \Classes\Pedido(1, 1); //Instancia a classe

        $lanche = new \Classes\Lanche("Hamburguer", 12.50, ["Pao","Carne","Alface","Tomate"],[1,2,2,2]); //Instancia a classe

        $bebida = new \Classes\Bebida("Cola", 5.40, "Pepsi", "250ml"); //Instancia a classe

        $cupom = new \Classes\Cupom("PW32", 10); //Instancia a classe
        $acomp = new \Classes\Acompanhamento("Batata Frita", 3.10, "Grande"); //Instancia a classe

        // echo "<h1>Classe Pedido </h1><br />";
        // $pedido -> addProduto($lanche);
        // $pedido -> addProduto($bebida);
        // $pedido -> addProduto($acomp);
        // echo $pedido; //Imprime o pedido inteiro com os itens adicionados
        //Testar inserção de cupom next
        // echo "<br />";

        // echo "<h1>Customização</h1>";
        // $pedido -> customizar($lanche);

        echo "<div class=\"Pagina de espera\"> 
                <h1>Exemplo de tela de espera</h1>
            </div>";
        
        echo "<hr />";

        echo "<div class=\"metodoPagamento\">
                <form>
                    <tr>
                        <td> 
                            Pagar em Dinheiro
                        </td>
                        <td>
                            Levar para viagem
                        </td>
                    </tr>
                        <td>
                            <input type=\"image\" alt=\"Pagamento em dinheiro\" id=\"dinheiro\" name=\"dinheiro\" src=\"/Static/money2.png\" onclick=\"send('metodoPagamento', 0)\" value=\"\" height=\"250px\" width=\"300px\"/>
                        </td>
                        <td>
                            <input type=\"image\" alt=\"Pagamento no cartão\" id=\"cartao\" name=\"cartao\" src=\"/Static/cartao-credito.png\" onclick=\"send('metodoPagamento', 1)\" value=\"\" height=\"250px\" width=\"300px\"/>
                        </td>
                    </tr>
                </form>
              </div>";
        
        echo "<hr />";

    //     echo "<div class=\"Modo de Preparo\">
    //     <form>
    //         <tr>
    //         <td> 
    //             <a href=\"#\" id=\"metodoPagamento\" name=\"metodoPagamento\" onclick=\"send('metodoPagamento',0)\">Comer no Estabelecimento
    //         </td>
    //         <td>
    //             <a href=\"#\" id=\"metodoPag\" onclick=\"\">Levar para viagem
    //         </td>
    //         <input type=\"hidden\" id=\"metodoPagamento\" name=\"metodoPagamento\"
    //     </form>
    //   </div>";
        echo "<hr />";

        echo "<div class=\"Pagina de espera\"> 
                <h1>Exemplo de tela de espera</h1>
            </div>";
        
        echo "<hr />";

        echo "<div class=\"Pagina de espera\"> 
                <h1>Exemplo de tela de espera</h1>
            </div>";
        
        echo "<hr />";

        echo "<input type=\"image\" alt=\"Pagamento em dinheiro\" id=\"dinheiro\" name=\"dinheiro\" src=\"/Static/money2.png\" onclick=\"send('metodoPagamento', 0)\" value=\"\" height=\"250px\" width=\"300px\"/>";

        

    ?>

</body>
</html>