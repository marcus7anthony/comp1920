<?php 
ob_start();
/*
Author: Marcus Anthony
File: home.php
Version: 1.0
Last modified: June 11, 2015
*/

?>

<?php
date_default_timezone_set("America/Vancouver");

// Need the session:
session_start();
header("Cache-Control: no-store, no-cache, must-revalidate,post-check=0,pre-check=0,private");
header("Pragma:no-cache");

// check to see if they are authorized?
if ($_SESSION["valid"] != TRUE) {
	echo "You are not authorized to be here";
	ob_end_clean(); // Empty the buffer
	header ("Location: index.php");
	exit();
}
			
// Set the page title and include the header file:
define("TITLE", "Welcome");

// check to see if they have being logged for more than 100 seconds
if ((time()-$_SESSION["logintime"]) > 100) {
	echo "You have being logged on too long";
	ob_end_clean(); // Empty the buffer
	header ("Location: logout.php");
	exit();
} 
			
print "<h1>Welcome</h1>";
print "<p>Hello " . $_SESSION["username"] . "!</p>";
	
//Timestamp
print "<p>You have been logged in for " . (time()-$_SESSION["logintime"]). " seconds.</p>";

echo "<hr>";

//Links
print "<p><a href=\"index.php\">Go back to Index page</a></p>";
print "<p><a href=\"logout.php\">Log out now!</a></p>";

ob_end_flush();
?>
