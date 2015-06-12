<?php
/*
Author: Marcus Anthony
File: runner.php
Version: 1.0
Last modified: May 14, 2015
*/

/* This file contains a function that converts an array into a string that represents an HTML select element. */

function arrayToSelect($theArray){
	$theSelect = "<select name = \"myLife\">";
	
	foreach ($theArray as $element){
		$theSelect = $theSelect . "<option>". strtoupper($element) . "</option>"; // strtoupper makes every string element uppercase
	}
	
	$theSelect = $theSelect . "</select>";
	return $theSelect; 
}

require "array.php"; // pull array elements

$sample_array = array("mark","steve","adam");
$converted_array = array();

echo arrayToSelect($array); // parse elements into a dropdown selection

?>
