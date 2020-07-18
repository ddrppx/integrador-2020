<?php

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modo de Preparo</title>
</head>
<body>
    <div class="Modo de Preparo">
    	<h1>Modo de Preparo</h1>
        <form>
        	<table>
            	<tr style="text-align: center;">
                	<td> 
                    	Comer no estabelecimento
                    </td>
                    <td>
                        Embalar para viagem
                    </td>
                </tr>
                <tr>
                	<td>
                    	<input type="image" alt="Preparo para comer no estabelecimento" id="comeraqui" name="comeraqui" src="/Static/comer.png" onclick="send('modoPreparo', 0)" value="" height="250px" width="300px"/>
                    </td>
					<td>
                    	<input type="image" alt="Levar para viagem" id="paraviagem" name="paraviagem" src="/Static/viagem.png" onclick="send('modoPreparo', 1)" value="" height="250px" width="400px"/>
                	</td>
				</tr>
			</table>
            
            <input type="hidden" id="modoPreparo" name="modoPreparo" value=""/>
    	
    	</form>
    </div>
</body>
</html>