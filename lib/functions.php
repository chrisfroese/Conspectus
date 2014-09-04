<?php
// Build out URI to reload from form dropdown
// Need full url for this to work in Opera Mini
$pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";

if (isset($_POST['sg_uri']) && isset($_POST['sg_section_switcher'])) {
	$pageURL .= $_POST[sg_uri].$_POST[sg_section_switcher];
	$pageURL = htmlspecialchars( filter_var( $pageURL, FILTER_SANITIZE_URL ) );
	header("Location: $pageURL");
}

// Display menu from config.
function getMainNavigation () {
	$json = file_get_contents("config/config.json");
	$config = json_decode($json, TRUE);
	$nav = "<ul>\n";
	foreach($config['nav'] as $key=>$val) {
		$label = ucwords($key);
		$link = $val;
		$nav .= "<li><a href=\"{$link}\">{$label}</a></li>\n";
	}
	$nav .= "</ul>\n";
	return $nav;
}

function getMainNavigationHtml () {
	$json = file_get_contents("config/config.json");
	$config = json_decode($json, TRUE);
	$nav = "<ul>\n";
	foreach($config['nav'] as $key=>$val) {
		$label = ucwords($key);
		$link = $val;
		$nav .= "<li><a href=\"{$link}\">{$label}</a></li>\n";
	}
	$nav .= "</ul>\n";
	return $nav;
}

// Display title of each markup samples as a select option
function getPageNavigation ($type) {
	$files = array();
	$handle=opendir('markup/'.$type);
	while (false !== ($file = readdir($handle))) {
		if(stristr($file,'.html')){
			$files[] = $file;
		}
	}
	sort($files, SORT_NUMERIC);

	$page_nav = array();
	foreach ($files as $file) {
		$anchor = preg_replace("/\.html$/i", "", $file);
		$title = preg_replace(array("/\-/i", "/_/i"), array(" ", ". "), $anchor);
		$title = ucwords($title);
		$page_nav[] = array('anchor'=>$filename, 'title'=>$title);
	}

	return $page_nav;
}

// Display title of each markup samples as a select option
function getPageNavigationHtml($type) {
	$files = array();
	$handle=opendir('markup/'.$type);
	while (false !== ($file = readdir($handle))) {
		if(stristr($file,'.html')){
			$files[] = $file;
		}
	}

	sort($files, SORT_NUMERIC);
	foreach ($files as $file) {
		$filename = preg_replace("/\.html$/i", "", $file);
		$title = preg_replace(array("/\-/i", "/_/i"), array(" ", ". "), $filename);
		$title = ucwords($title);
		echo '<option value="#sg-'.$filename.'">'.$title.'</option>';
	}
}

// Display markup view & source
function getMarkup($type) {
	$files = array();
	$handle=opendir('markup/'.$type);
	while (false !== ($file = readdir($handle))) {
		if(stristr($file,'.html')) {
			$files[] = $file;
		}
	}

	sort($files, SORT_NUMERIC);
	foreach ($files as $file) {
		$filename = preg_replace("/\.html$/i", "", $file);
		$title = preg_replace(array("/\-/i", "/_/i"), array(" ", ". "), $filename);
		$documentation = 'doc/'.$type.'/'.$file;
		echo '<div class="sg-markup sg-section">';
		echo '<div class="sg-display">';
		echo '<h2 class="sg-h2"><a id="sg-'.$filename.'" class="sg-anchor">'.$title.'</a></h2>';
		if (file_exists($documentation)) {
			echo '<div class="sg-doc">';
			echo '<h3 class="sg-h3">Usage</h3>';
			include($documentation);
			echo '</div>';
		}
		echo '<h3 class="sg-h3">Example</h3>';
		include('markup/'.$type.'/'.$file);
		echo '</div>';
		echo '<div class="sg-markup-controls"><a class="sg-btn sg-btn--source" href="#">View Source</a> <a class="sg-btn--top" href="#top">Back to Top</a> </div>';
		echo '<div class="sg-source sg-animated">';
		echo '<a class="sg-btn sg-btn--select" href="#">Copy Source</a>';
		echo '<pre class="prettyprint linenums"><code>';
		echo htmlspecialchars(file_get_contents('markup/'.$type.'/'.$file));
		echo '</code></pre>';
		echo '</div>';
		echo '</div>';
	}
}
?>
