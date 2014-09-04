<div id="top" class="sg-header sg-container">
	<h1 class="sg-logo"><?= $sg->getTitle(); ?></h1>
	<?= $sg->getMainNavigationHtml() ?>

	<form id="js-sg-nav" action=""	method="post" class="sg-nav">
		<select id="js-sg-section-switcher" class="sg-section-switcher" name="sg_section_switcher">
				<optgroup label="Base Styles">
					<?php $sg->getPageNavigationHtml($markup_section); ?>
				</optgroup>
		</select>
		<input type="hidden" name="sg_uri" value="<?php echo $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>">
		<button type="submit" class="sg-submit-btn">Go</button>
	</form>
	<!--/.sg-nav-->
</div>
<!--/.sg-header-->
