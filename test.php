<?php

require 'vendor/autoload.php';

use Classes\Acompanhamento;
use \Classes\Bebida;
	use \Classes\Promocao;
	use \Models\acompDAO;
	use \Models\bebidaDAO;

	// $acp = new Acompanhamento("Batata-frita", 3.50, "Grande");

	$beb1 = new Bebida("Chá", 3.90,"Ana maria", "Médio");
	$beb2 = new Bebida("Refrigerante Guaraná", 2.67, "Antártica", "Grande");

	// $acompanhamento = new acompDAO;
	// $bebidas = new BebidaDAO;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<p><?= $beb1 ?></p>
	<p><?= $beb2 ?></p>

	<?php

		// $acomps -> create($acp);
		// $acomps -> update(5, $acp);
		// $acomps -> delete(6);
		// $acomps -> read() 

		// $bebs -> create($beb1);
		// $bebs -> create($beb2);
		// $bebs -> update(6, $beb1);
		// $bebs -> delete(6);
		// $bebs -> read();


		// $rows = 
		echo "<br/>End.<br/>";

		// echo "<table style=\"boder: solid 1px white\">";
		// foreach ($rows as $row){
		// 	echo "<tr>
		// 		<td>".$row['id']."</td>
		// 		<td>".$row['marca']."</td>
		// 		<td>".$row ['nome']."</td>
		// 		<td>".$row['valor']."</td>
		// 		<td>".$row['tamanho']."</td>
		// 	</tr>";
		// }
		// echo "</table>";

	?>

</body>
</html>