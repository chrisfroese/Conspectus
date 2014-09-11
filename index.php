<?php $markup_section = FALSE; ?>
<?php include('./template/head.php'); ?>
<div class="con-container">
	<div class="con-meta">

		<h1 class="con-mega"><?= $con->getTitle() ?></h1>
		<h4>Style Guide</h4>
		<h5>Version <?= $con->getVersion() ?></h5>
		<h3>By <a href="mailto:<?= $con->getAuthorEmail() ?>"><?= $con->getAuthor() ?></a></h3>

	</div>
</div>
<?php include('./template/foot.php'); ?>
