<?php
/**
 * Conspectus
 *
 * A living style guide written in PHP.
 * @author Chris Froese <christopherfroese@gmail.com>
 * @version 1.1
 */

class Conspectus {

	var $config = array();

	function __construct() {
		$path = __DIR__;
		$config_path = rtrim($path,"lib")."config/config.json";
		$json = file_get_contents($config_path);
		$this->config = json_decode($json, TRUE);
	}

	/**
	 * Get style guide title.
	 * @return string
	 */
	function getTitle(){
		return $this->config['title'];
	}

	/**
	* Get style guide author.
	* @return string
	*/
	function getAuthor() {
		return $this->config['author'];
	}

	/**
	* Get style guide author email.
	* @return string
	*/
	function getAuthorEmail() {
		return $this->config['author_email'];
	}

	/**
	* Get style guide author URL.
	* @return string
	*/
	function getAuthorUrl() {
		return $this->config['author_url'];
	}

	/**
	* Get style guide version
	* @return string
	*/
	function getVersion() {
			return $this->config['version'];
	}

	/**
	* Get style revision date
	* @return string
	*/
	function getVersionDate() {
		return $this->config['version_date'];
	}

	/**
	* Get style sheets.
	* @return array
	*/
	function getStyleSheets() {
		return $this->config['style_sheets'];
	}

	/**
	* Get style guide font stacks.
	*
	* Retruns an associative array containing $label=>$font_stack pairs.
	*
	* @return array
	*/
	function getFontStacks() {
		return $this->config['font_stacks'];
	}

	/**
	* Get style guide colors.
	*
	* Retruns an associative array containing $label=>$color pairs.
	*
	* @return array
	*/
	function getColors() {
		return $this->config['colors'];
	}

	/**
	* Get main navigation from config.
	*
	* Retruns an associative array containing $label=>$page pairs.
	*
	* @return array
	*/
	function getMainNavigation () {
		$main_nav = array();
		foreach($this->config['nav'] as $key=>$val) {
			$label = ucwords($key);
			$main_nav[] = array('label'=>$label, 'url'=>$val);
		}
		return $main_nav;
	}

	/**
	* Get page navagation for elements.
	*
	* Retruns an associative array containing $anchor=>$title pairs.
	*
	* @param string $dir Directory of markup elements to return
	* @param bool $strip_numbers Weather to remove numbers preceding title.
	* @return array
	*/
	function getPageNavigation ($dir, $strip_numbers = FALSE) {
		$files = array();
		$handle=opendir('markup/'.$dir);
		while (false !== ($file = readdir($handle))) {
			if(stristr($file,'.html')){
				$files[] = $file;
			}
		}
		sort($files, SORT_NUMERIC);

		$page_nav = array();
		foreach ($files as $file) {
			$anchor = preg_replace("/\.html$/iu", "", $file);
			if ($strip_numbers) {
				$anchor = preg_replace("/^[0-9]+(\.*[0-9]*)_/u", '', $anchor);
			}
			$title = preg_replace(array("/\-/", "/_/"), array(" ", ". "), $anchor);
			$title = ucwords($title);

			$anchor = "con-" . $anchor;

			$page_nav[] = array('anchor'=>$anchor, 'title'=>$title);
		}

		return $page_nav;
	}


	/**
	* Get markup for elements.
	*
	* Retruns a array containg ('title'=>$title, 'anchor'=>$anchor, 'markup'=>$markup, 'doc'=>$doc) for each element.
	*
	* @param string $dir Directory of markup elements to return
	* @param bool $strip_numbers Weather to remove numbers preceding title.
	* @return array
	*/
	function getMarkup($dir, $strip_numbers = FALSE) {
		$files = array();
		$handle=opendir('markup/'.$dir);
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

			$doc_path = 'doc/'.$dir.'/'.$file;
			if (file_exists($doc_path)) {
				$doc = file_get_contents($doc_path);
			} else {
				$doc = FALSE;
			}

			$markup = file_get_contents('markup/'.$dir.'/'.$file);
			//echo htmlspecialchars(file_get_contents('markup/'.$type.'/'.$file));
			$section[] = array('title'=>$title, 'anchor'=>$anchor, 'markup'=>$markup, 'doc'=>$doc);
		}
		return $section;
	}
}
