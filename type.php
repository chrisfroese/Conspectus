<?php $markup_section = "type"; ?>
<?php include('./template/head.php'); ?>
<?php include('./template/nav.php'); ?>
	<div class="sg-body sg-container">

		<div class="sg-base-styles">
			<h1 class="sg-h1">Typography</h1>
			<div class="sg-font-stacks sg-section">
				<h2 class="sg-h2"><a id="sg-fontStacks" class="sg-anchor">Font Stacks</a></h2>
				<?php foreach($sg->getFontStacks() as $title=>$stack): ?>
				<h3 style="font-family:<?= $stack ?>"><?= ucwords($title) ?>: <?= $stack ?></h3>
				<?php endforeach; ?>
			</div><!--/.sg-font-stacks-->
			<?php $sg->getMarkupHtml($markup_section); ?>
		</div><!--/.sg-base-styles-->

		</div><!--/.sg-body-->

<?php include('./template/foot.php'); ?>
