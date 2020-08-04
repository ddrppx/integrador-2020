<?php

	require 'vendor/autoload.php';

	use Classes\Acompanhamento;
	use \Classes\Bebida;
	use Classes\Cupom;
	use \Classes\Lanche;
	use \Classes\Promocao;

	use \Models\acompDAO;
	use \Models\bebidaDAO;
	use \Models\cupomDAO;
	use \Models\promocaoDAO;
	use \Models\lancheDAO;

	// $acp = new Acompanhamento("Batata-frita", 3.50, "Grande");
	// $beb2 = new Bebida("Refrigerante Guaraná", 2.67, "Antártica", "Grande");
	// $cupom2 = new Cupom("PKR2B", 25);
	// $promo1 = new Promocao("Feriado", 10);
	$lanche = new Lanche("Hamburguer talhado", 7.50, [2, 3, 6], [2, 2, 2]);

	// $acomps = new acompDAO;
	// $bebidas = new bebidaDAO;
	// $cupons = new cupomDAO;
	// $promos = new promocaoDAO;
	$lanches = new lancheDAO;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<p><?= $lanche ?></p>

	<?php

		// $acomps -> create($);
		// echo "<h3>Acompanhamentos</h3>";
		// $acomps -> read();
		// echo "<hr/>";
		// $acomps -> update();
		// $acomps -> delete();
		

		// $bebidas -> create();
		// echo "<h3>Bebidas</h3>";
		// $bebidas -> read();
		// echo "<hr/>";
		// $bebidas -> update();
		// $bebidas -> delete();
		 

		// $cupons -> create();
		// echo "<h3>Cupons</h3>";
		// $cupons -> read();
		// echo "<hr/>";
		// $cupons -> update();
		// $cupons -> delete();

		// $promos -> create();
		// echo "<h3>Promoções</h3>";
		// $promos -> read();
		// echo "<hr/>";
		// $promos -> update();
		// $promos -> delete();
		// $promos -> create();

		// $lanches -> create($lanche);
		$lanches -> update(1, $lanche);
		echo "<br/>End.<br/>";


	?>

</body>
</html>