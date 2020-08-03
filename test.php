<?php

	require 'vendor/autoload.php';

	use Classes\Acompanhamento;
	use \Classes\Bebida;
	use Classes\Cupom;
	use \Classes\Promocao;

	use \Models\acompDAO;
	use \Models\bebidaDAO;
	use Models\cupomDAO;

// $acp = new Acompanhamento("Batata-frita", 3.50, "Grande");
	// $beb2 = new Bebida("Refrigerante Guaraná", 2.67, "Antártica", "Grande");
	$cupom1 = new Cupom("BANANA", 376);
	$cupom2 = new Cupom("PKR2B", 25);

	// $acompanhamento = new acompDAO;
	// $bebidas = new BebidaDAO;
	$cupons = new cupomDAO;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<p><?= $cupom1 ?></p>
	<p><?= $cupom2 ?></p>

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

		// $cupons -> create($cupom1);
		// $cupons -> create($cupom2);
		// $cupons -> update();
		// $cupons -> delete();

		
		echo "<br/>End.<br/>";
		
		// $rows = $cupons -> read();
		// echo "<table style=\"boder: solid 1px white\">";
		// foreach ($rows as $row){
		// 	echo "<tr>
		// 		<td>".$row['id']."</td>
		// 		<td>".$row['codigo']."</td>
		// 		<td>".$row ['desconto']."</td>
		// 	</tr>";
		// }
		// echo "</table>";

	?>

</body>
</html>