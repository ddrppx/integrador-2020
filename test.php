<?php

require 'vendor/autoload.php';
	use \Classes\Acompanhamento;
	use \Classes\Promocao;
	use \Classes\AcompDAO;

// require 'src/Classes/Models/AcompDAO.php';
// require 'src/Classes/Database/Connection.php';

	$acp = new Acompanhamento("Batata", 4.50, "Grande");

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
		// echo "<hr />";
		$bruh -> read();
	?>

</body>
</html>