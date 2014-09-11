<?php
require_once("lib/Conspectus.php");
$con = new Conspectus();
?>
<?php include('./template/head.php'); ?>
  <div class="container">
    <div class="row">
      <div class="col-75">
        <h1><?= $section_title ?></h1>
        <hr>
        <?php foreach($con->getMarkup($markup_section, TRUE) as $element ) : ?>
        <section class="con-section">
          <a id="<?= $element['anchor'] ?>"><h2><?= $element['title'] ?></h2></a>
          <?php if ($element['doc']) : ?>
            <?= $element['doc'] ?>
          <?php endif; ?>
          <div><strong><small class="quite">EXAMPLE</small></strong></div>
          <?= $element['markup'] ?>
          <div class="con-markup">
            <pre class="prettyprint linenums"><code class="language-html"><?php echo htmlentities($element['markup']); ?></code></pre>
          </div>
        </section>
        <?php endforeach; ?>
      </div>

      <div class="col-25">
        <ul class="con-page-nav">
        <?php foreach($con->getMarkup($markup_section, TRUE) as $element ) : ?>
          <li><a href="#<?= $element['anchor'] ?>"><?= $element['title'] ?></a></li>
        <?php endforeach; ?>
        </ul>
      </div>
  </div>
</div>
<?php include('./template/foot.php'); ?>
