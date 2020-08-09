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
	use \Models\pedidoDAO;

	$acp = new Acompanhamento(1, "Batata", 4.50, "Grande");
	$beb2 = new Bebida(4, "Refrigerante Guaraná", 2.67, "Antártica", "Grande");
	// $cupom2 = new Cupom("PKR2B", 25);
	// $promo1 = new Promocao("Feriado", 10);
	$lanche = new Lanche(1,"Hamburguer talhado", 7.50, [2, 3, 6], [2, 2, 2]);

	$ped = new Pedido(0, 0);
	$ped -> addProduto($lanche);
	$ped -> addProduto($acp);
	$ped -> addProduto($beb2);

	// $acomps = new acompDAO;
	$bebidas = new bebidaDAO;
	// $cupons = new cupomDAO;
	// $promos = new promocaoDAO;
	// $lanches = new lancheDAO;
	$pedido = new pedidoDAO;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<!-- <p><?= $ped ?></p> -->

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
		// echo $ped -> getHora();
		// $pedido -> create($ped);
		// $pedido -> update(1, $ped);
		// $pedido -> delete(2);
		echo "<br/>End.<br/>";
			// Teste array com obj
		// $produto = [];

		// $produto[] = $lanche;
		// $produto[] = $acp;

		// print_r($produto);

		// echo "<pre>";
		// foreach ($produto as $key => $value) {
		// 	echo $key. ": " .$value. "<br/>";
		// }
		session_start();
		$rows = $bebidas -> read();
			//nome marca valor tamanho
		foreach ($rows as $valores) {
			echo "Nome: ". $valores['nome']. "<br/>";
			echo "Marca: ". $valores['marca']. "<br/>";
			echo "Valor: ". $valores['valor']. "<br/>";
			echo "Tamanho: ". $valores['tamanho']. "<br/>";
			echo '<a href="carrinho.php?add=carrinho&id='. $valores['id']. '">Adicionar ao carrinho </a>';
			echo "<br/>";
		}
		
		echo "</pre>";
	
		$test = $bebidas -> readValor(2);
		unset($_SESSION['acomp']);
		var_dump($test);
	?>

</body>
</html>