<?php $markup_section = "base"; ?>
<?php include('./template/head.php'); ?>
<?php include('./template/nav.php'); ?>
<div class="sg-body sg-container">
	<div class="sg-info">
		<div class="sg-about sg-section">
			<h2 class="sg-h2"><a id="sg-about" class="sg-anchor">About</a></h2>
			<p>Comments and documentation about your style guide.</p>
		</div><!--/.sg-about-->

		<div class="sg-colors sg-section">
			<h2 class="sg-h2"><a id="sg-colors" class="sg-anchor">Colors</a></h2>
				<div class="sg-color"><span class="sg-color-swatch color-primary"><span class="sg-animated">#88ffda</span></span></div>
				<div class="sg-color"><span class="sg-color-swatch color-secondary"><span class="sg-animated">#4dd3c9</span></span></div>
				<div class="sg-color"><span class="sg-color-swatch color-tertiary"><span class="sg-animated">#339db0</span></span></div>
				<div class="sg-markup-controls"><a class="sg-btn--top" href="#top">Back to Top</a></div>
		</div><!--/.sg-colors-->

		<div class="sg-font-stacks sg-section">
			<h2 class="sg-h2"><a id="sg-fontStacks" class="sg-anchor">Font Stacks</a></h2>
			<p class="sg-font sg-font-primary">"HelveticaNeue", "Helvetica", Arial, sans-serif;</p>
			<p class="sg-font sg-font-secondary">Georgia, Times, "Times New Roman", serif;</p>
			<div class="sg-markup-controls"><a class="sg-btn--top" href="#top">Back to Top</a></div>
		</div><!--/.sg-font-stacks-->
	</div><!--/.sg-info-->

	<div class="sg-base-styles">
		<h1 class="sg-h1">Base Styles</h1>
		<?php $sg->getMarkupHtml($markup_section); ?>
	</div><!--/.sg-base-styles-->

	</div><!--/.sg-body-->

<?php include('./template/foot.php'); ?>
