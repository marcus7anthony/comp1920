<?php
/*
Author: Marcus Anthony
File: post.php
Version: 1.0
Last modified: May 21, 2015
*/

error_reporting(E_ERROR | E_PARSE);

$date = date("F j, o");

$filepost = fopen("messageboard.txt","a") or die ("Error opening file<br>");

fwrite($filepost, "----- \n  $date \n ");

$user_message = $_POST["textarea"];

if(isset($_POST["submit"]))
{	
	fwrite($filepost, "$user_message");
}

fclose($filepost) or die ("Error closing file<br>");
echo "Thanks for posting" . "<br>";

?>

<a href="read_post.html">Back to read_post.html</a>
