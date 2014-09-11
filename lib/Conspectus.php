<?php

class Conspectus {

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

	function getFontStacks() {
		return $this->config['font_stacks'];
	}

	function getColors() {
		return $this->config['colors'];
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

	// Display title of each markup samples as a select option
	function getPageNavigation ($type, $strip_numbers = FALSE) {
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
			if ($strip_numbers) {
				$filename = preg_replace("/^[0-9]+_/u", '', $filename);
			}
			$title = preg_replace(array("/\-/i", "/_/i"), array(" ", ". "), $anchor);
			$title = ucwords($title);
			$page_nav[] = array('anchor'=>$anchor, 'title'=>$title);
		}

		return $page_nav;
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
			$anchor = preg_replace("/\.html$/iu", "", $file);
			if ($strip_numbers) {
				$anchor = preg_replace("/^[0-9]+(\.*[0-9]*)_/u", '', $anchor);
			}

			$title = preg_replace(array("/\-/", "/_/"), array(" ", ". "), $anchor);
			$title = ucwords($title);

			$anchor = "con-" . $anchor;

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
}
