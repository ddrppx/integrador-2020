<?php

	require 'vendor/autoload.php';

	use Classes\Acompanhamento;
	use \Classes\Bebida;
	use Classes\Cupom;
	use \Classes\Lanche;
	use \Classes\Pedido;
	use \Classes\Promocao;

	use \Models\acompDAO;
	use \Models\bebidaDAO;
	use \Models\cupomDAO;
	use \Models\promocaoDAO;
	use \Models\lancheDAO;

	$acp = new Acompanhamento(1, "Batata", 4.50, "Grande");
	$beb2 = new Bebida(2, "Refrigerante Guaraná", 2.67, "Antártica", "Grande");
	// $cupom2 = new Cupom("PKR2B", 25);
	// $promo1 = new Promocao("Feriado", 10);
	$lanche = new Lanche(1,"Hamburguer talhado", 7.50, [2, 3, 6], [2, 2, 2]);

	$ped = new Pedido(0, 0);
	// $ped -> addProduto($lanche);
	// $ped -> addProduto($acp);
	// $ped -> addProduto($beb2);

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
	<p><?= $ped ?></p>

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
		// $lanches -> update(1, $lanche);

		// print_r($ped -> getArrayProdutos());
		// print($ped -> getUniqueProduto(0));
		// print($ped -> getUniqueProduto(1));
		echo "<br/>End.<br/>";
		// echo get_class($lanche). "<br/>";
		// echo get_class($beb2). "<br/>";
		// echo get_class($acp);
		$ad = $ped -> getIdProdutos($lanche);
		var_dump($ad);
	?>

</body>
</html>