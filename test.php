<html>
    <head>
        
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">



        <script>
            //
        function enviar(newiD, newValue) {
            document.getElementById(newiD).value = newValue;
            submit();
        }

        function teste() {
            console.log("Clickity click");
        }

        function executar(name) {
            let div = document.getElementById('lanches');
        
            div.innerHTML = "<?php $pedido -> addProduto(`{name}`); ?>";
        }
        
        </script>
    </head></submit>
    <body>
        <?php 

            echo $_GET['metodoPagamento'];
            echo $_GET['test'];
            echo "<form action=\"test.php\" method=\"get\">
                    <tr>
                        <td> 
                        <button id=\"metodoPagamento\" onclick=\"enviar('0 breh')\">Comer aqui </button>
                        </td>
                        <td>
                            <button style=\"text-decoration: none;\" href=\"\" id=\"metodoPagamento\" onclick=\"enviar('1 bruh')\">Levar para viagem</button>
                        </td>
                    <input type=\"hidden\" id=\"enviarMetodoPagamento\" name=\"metodoPagamento\" value=\"\">
                    
                </form>";
                
                echo "<form action=\"test.php\" method=\"get\">
                
                <input type=\"image\" src=\"./acrylic.png\" onclick=\"enviar('test','dale porra')\"/>
                
                <input type=\"hidden\" id=\"test\" name=\"test\" value=\"2\"/>

                </form>
                ";
        
           ?>

                <div class="metodoPagamento">
                <form>
                    <tr>
                        <td> 
                            Pagar em Dinheiro
                        </td>
                    </tr>
                        <td>
                            Levar para viagem
                        </td>
                        <tr>
                            Casa

                        </tr>
                        <tr>
                            Carro
                        </tr>
                    
                </form>
              </div>
    </body>
</html>
