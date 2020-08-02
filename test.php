<?php

require 'vendor/autoload.php';
	use \Classes\Acompanhamento;
	use \Classes\Promocao;
	use \Models\AcompDAO;

// require 'src/Classes/Models/AcompDAO.php';
// require 'src/Classes/Database/Connection.php';

	$acp = new Acompanhamento("Fatia de peixe", 12.50, "Gigante");

	$promo = new Promocao("Feliz natal", 10);

	$bruh = new AcompDAO;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<p><?= $acp ?></p>
	<p><?= $promo ?></p>

	<?php $acp -> addPromocao($promo); ?>

	<p><?= $acp ?></p>

	<?php

		$bruh -> create($acp);

		$rows = $bruh -> read();
		echo "<br/>End.<br/>";

		foreach ($rows as $acp){
			echo "<table><tr>
				<td>".$acp['id']."</td>
				<td>".$acp ['nome']."</td>
				<td>".$acp['valor']."</td>
				<td>".$acp['tamanho']."</td>
			</tr></table>";
		}

	?>

</body>
</html>