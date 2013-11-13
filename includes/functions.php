<?php 
	function output($text){
		global $output;
		$output .= $text;
	}
	function map($value, $low1, $high1, $low2, $high2) {
	    return ($value / ($high1 - $low1)) * ($high2 - $low2) + $low2;
	}
	function attr($attr,$value){
		echo $attr."='".$value."'";
	}
 ?>