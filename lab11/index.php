<link rel="stylesheet" type="text/css" href="style.css">
<?php

/* File: index.php
Author: Marcus Anthony
Version: 1.0
Last modified: May 18, 2015 */

$fileContentsArray = file("textfile.txt");

echo "<table>";

foreach ($fileContentsArray as $one_persons_data) {
	list($a,$b,$c,$d,$e,$f) = explode(",", $one_persons_data);
	print "<tr><td>$a</td><td>$b</td><td>$c</td><td>$d</td><td>$e</td><td>$f</td></tr>";
	}
	
echo "</table>";

?>
