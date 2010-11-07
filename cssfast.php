<?php
/*
 * CSSFast
 * The diet for CSS that doesn't TOTALLY FUCK UP YOUR CASCADE
 *
 * The idea is that it does very little other than remove whitespace and newlines in a select number of places.
 * 
 * @author Connrs
 * HELP ME I DON'T KNOW MUCH PHPDOCUMENTOR AND IM STUCK IN A CLOSET IN A WAREHOUSE PLEASE GET ME OUT
 */
class CSSFast {
	// The css variable. Stick it all in here and we will work magic upon it
	var $css;
	
	// The constructor. Pass your CSS in or die
	function __construct($css=null) {
		if(is_string($css)) {
			$this->fastCSS($css);
		}
	}
	
	//Trim that stuff!
	function fastCSS($css) {
		$css = preg_replace('/\/\*.*?\*\//m','',$css); //Remove comments
		$css = preg_replace('/^\s+/','',$css); // Remove excess whitespace on lines
		$css = preg_replace('/\n/','',$css); // Remove newlines
		$css = str_replace(';}','}',$css); // Remove final semi-colon at last declaration of a CSS block
		$this->css = $css;
	}
	
	// Output the trimmed out
	function outputFast() {
		return $this->css;
	}
}