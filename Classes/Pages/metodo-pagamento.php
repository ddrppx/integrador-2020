<?php

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Método de Pagamento</title>
</head>
<body>

	<div class="metodoPagamento">
	    <h1 style="text-align: center;">Como deseja pagar?</h1>
	    <form style="vertical-align: center;">
	    	<table>
	        	<tr style="text-align: center;">
	            	<td> 
	                    Pagar em Dinheiro
	                </td>
	                <td>
	                	Pagar com cartão
	                </td>
	            </tr>
	            <tr>
	            	<td>
	                	<input type="image" alt="Pagamento em dinheiro" id="dinheiro" name="dinheiro" src="/Static/money2.png" onclick="send('metodoPagamento', 0)" value="" height="250px" width="300px"/>
					</td>
	                <td>
	                	<input type="image\" alt="Pagamento no cartão" id="cartao" name="cartao" src="/Static/cartao-credito.png" onclick="send('metodoPagamento', 1)" value="" height="250px" width="400px"/>
	                </td>
	            </tr>
	        </table>
	        <input type="hidden" id="metodoPagamento" name="metodoPagamento" value=""/>
	    </form>
	</div>
</body>
</html>