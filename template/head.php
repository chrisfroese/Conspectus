<?php
require_once("lib/StyleGuide.php");
$sg = new StyleGuide();
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
	<title><?= $sg->getTitle(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Style Guide Boilerplate Styles. Don't remove -->
	<link rel="stylesheet" href="css/sg-style.css">
	<?php foreach($sg->getStyleSheets() as $style_sheet) : ?>
	<link rel="stylesheet" href="<?= $style_sheet ?>">
	<?php endforeach; ?>
</head>
<body>
