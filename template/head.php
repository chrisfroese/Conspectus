<?php
require_once("lib/Conspectus.php");
$con = new Conspectus();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?= $con->getTitle() ?></title>
	<meta name="description" content="<?= $con->getTitle() ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/conspectus.css">
	<link rel="stylesheet" href="css/grid.css">
	<?php foreach($con->getStyleSheets() as $style_sheet) : ?>
	<link rel="stylesheet" href="<?= $style_sheet ?>">
	<?php endforeach; ?>

</head>
<body>
	<!--[if lt IE 8]>
	<p>You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="con-main-nav cF">
		<div class="container">
		<nav>
			<ul>
				<li><a class="con-logo" href="index.php"><?= $con->getTitle(); ?></a></li>
		<?php foreach($con->getMainNavigation() as $item) : ?>
				<li><a href="<?= $item['url'] ?>"><?= $item['label'] ?></a></li>
		<?php endforeach; ?>
			</ul>
		</nav>
	</div>
</div>
