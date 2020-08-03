<?php

	require 'vendor/autoload.php';

	use Classes\Acompanhamento;
	use \Classes\Bebida;
	use Classes\Cupom;
	use \Classes\Promocao;

	use \Models\acompDAO;
	use \Models\bebidaDAO;
	use Models\cupomDAO;
	use Models\promocaoDAO;

	// $acp = new Acompanhamento("Batata-frita", 3.50, "Grande");
	// $beb2 = new Bebida("Refrigerante Guaraná", 2.67, "Antártica", "Grande");
	// $cupom2 = new Cupom("PKR2B", 25);
	$promo1 = new Promocao("Feriado", 10);
	$promo2 = new Promocao("Passe de onibus", 79);

	// $acompanhamento = new acompDAO;
	// $bebidas = new BebidaDAO;
	// $cupons = new cupomDAO;
	$promos = new promocaoDAO;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<p><?= $promo1 ?></p>
	<p><?= $promo2 ?></p>

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

		// $cupons -> create();
		// $cupons -> create();
		// $cupons -> update();
		// $cupons -> delete();

		// $promos -> create();
		// $promos -> create();
		// $promos -> update();
		// $promos -> delete();
		// $promos -> create();

		echo "<br/>End.<br/>";
		
		$rows = $promos -> read();
	
		echo "<table style=\"boder: solid 1px white\">";
		foreach ($rows as $row){
			echo "<tr>
				<td>".$row['id']."</td>
				<td>".$row['nome']."</td>
				<td>".$row ['desconto']."</td>
			</tr>";
		}
		echo "</table>";

	?>

</body>
</html>