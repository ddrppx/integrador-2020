<?php

require 'vendor/autoload.php';
use Classes\Acompanhamento;
use Classes\Promocao;

	$acp = new Acompanhamento("Batata", 4.50, "Grande");

	$promo = new Promocao("Feliz natal", 10);
?>

<!DOCTYPE html>
<html lang="en">
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
</body>
</html>