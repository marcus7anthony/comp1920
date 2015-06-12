<?php
/*
Author: Marcus Anthony
File: read.php
Version: 1.0
Last modified: May 21, 2015
*/

$filehandle = fopen("messageboard.txt","a");

$myArray = file("messageboard.txt");

foreach ($myArray as $message)
{	
	echo nl2br("$message \n");
}

?>

<a href="read_post.html">Back to read_post.html</a>
