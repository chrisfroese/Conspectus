
<?php include('./template/head.php'); ?>
<?php include('./template/nav.php'); ?>
<div class="sg-body sg-container">
	<div class="sg-info">
		<div class="sg-about sg-section">
			<h1 class="sg-h1"><?= $sg->getTitle() ?></h1>
			<p>This is your style guide homepage. Put info here if needed.</p>
		</div><!--/.sg-about-->

		<div class="sg-colors sg-section">
			<h2 class="sg-h2"><a id="sg-colors" class="sg-anchor">Colors</a></h2>
				<div class="sg-color"><span class="sg-color-swatch color-primary"><span class="sg-animated">#88ffda</span></span></div>
				<div class="sg-color"><span class="sg-color-swatch color-secondary"><span class="sg-animated">#4dd3c9</span></span></div>
				<div class="sg-color"><span class="sg-color-swatch color-tertiary"><span class="sg-animated">#339db0</span></span></div>
				<div class="sg-markup-controls"><a class="sg-btn--top" href="#top">Back to Top</a></div>
		</div><!--/.sg-colors-->

		
	</div><!--/.sg-info-->
	<!--/.sg-base-styles-->
	</div><!--/.sg-body-->

<?php include('./template/foot.php'); ?>
