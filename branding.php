<?php
require_once("lib/Conspectus.php");
$con = new Conspectus();
$markup_section = "branding";
$section_title =  "Branding";
?>
<?php include('./template/head.php'); ?>
	<div class="container">
		<div class="row">
			<div class="col-75">
				<h1><?= $section_title ?></h1>
				<hr>
				<section class="con-section">
					<a id="con-logos"><h2>Logos</h2></a>
					<h3>Header Logo</h3>
					<img src="http://lorempixel.com/320/200/abstract">
					<p>Use on all pages with default header.</p>
					<h3>Small Logo</h3>
					<img src="http://lorempixel.com/80/80/abstract">
					<p>Use to brand media players.</p>
				</section>
				<section class="con-section">
					<a id="con-colors"><h2>Colors</h2></a>
					<?php foreach($con->getColors() as $label=>$color) : ?>
					<p><?php echo ucwords($label); ?>: <?= $color ?></p>
					<div class="con-color" style="background-color: <?= $color ?>">&nbsp;</div>
					<?php endforeach; ?>
				</section>
			</div>

			<div class="col-25">
				<ul class="con-page-nav">
					<li><a href="#con-colors">Colors</a></li>
				</ul>
			</div>
		</div>
	</div>
<?php include('./template/foot.php'); ?>
