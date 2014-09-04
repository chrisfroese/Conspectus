<?php

class StyleGuide {

	var $config = array();

	function __construct() {
		$path = __DIR__;
		$config_path = rtrim($path,"lib")."config/config.json";
		$json = file_get_contents($config_path);
		$this->config = json_decode($json, TRUE);
	}
	function getTitle(){
		return $this->config['title'];
	}

	function getAuthor() {
		return $this->config['author'];
	}

	function getAuthorEmail() {
		return $this->config['author_email'];
	}

	function getAuthorUrl() {
		return $this->config['author_url'];
	}
	function getVersion() {
			return $this->config['version'];
	}

	function getVersionDate() {
		return $this->config['version_date'];
	}

	function getStyleSheets() {
		return $this->config['style_sheets'];
	}

	// Display main navigation from config.
	function getMainNavigation () {
		$main_nav = array();
		foreach($this->config['nav'] as $key=>$val) {
			$label = ucwords($key);
			$main_nav[] = array('label'=>$label, 'url'=>$val);
		}
		return $main_nav;
	}

	function getMainNavigationHtml () {
		$main_nav = $this->getMainNavigation();
		$nav = "<nav class=\"sg-main-nav\">\n<ul>\n";
		foreach($main_nav as $item) {
			$label = ucwords($item['label']);
			$link = $item['url'];
			$nav .= "<li><a href=\"{$link}\">{$label}</a></li>\n";
		}
		$nav .= "</ul>\n</nav>\n";
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
			$page_nav[] = array('anchor'=>$anchor, 'title'=>$title);
		}

		return $page_nav;
	}

	// Display title of each markup samples as a select option
	function getPageNavigationHtml ($type) {
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
	function getMarkup($type, $strip_numbers = FALSE) {
		$files = array();
		$handle=opendir('markup/'.$type);
		while (false !== ($file = readdir($handle))) {
			if(stristr($file,'.html')) {
				$files[] = $file;
			}
		}
		sort($files, SORT_NUMERIC);

		$section = array();
		foreach ($files as $file) {
			$anchor = preg_replace("/\.html$/i", "", $file);
			$title  = preg_replace(array("/\-/i", "/_/i"), array(" ", ". "), $anchor);

			$doc_path = 'doc/'.$type.'/'.$file;
			if (file_exists($doc_path)) {
				$doc = file_get_contents($doc_path);
			} else {
				$doc = FALSE;
			}

			$markup = file_get_contents('markup/'.$type.'/'.$file);
			//echo htmlspecialchars(file_get_contents('markup/'.$type.'/'.$file));
			$section[] = array('title'=>$title, 'anchor'=>$anchor, 'markup'=>$markup, 'doc'=>$doc);
	}
	return $section;
}
	// Display markup view & source
	function getMarkupHtml($type, $strip_numbers = FALSE) {
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
}
