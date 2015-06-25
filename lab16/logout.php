<?php
/*
Author: Marcus Anthony
File: logout.php
Version: 1.0
Last modified: June 11, 2015
*/

ob_start();

session_start();
header("Cache-Control: no-store, no-cache, must-revalidate,post-check=0,pre-check=0,private");
header("Pragma:no-cache");

$_SESSION["valid"] = FALSE;
		
//Delete session variable
unset($_SESSION);

//Reset session array
$_SESSION = array();

if(isset($_COOKIE[session_name()])) {
	setcookie(session_name(),"",time()-42000,"/");
	}
	
session_destroy();

define("TITLE", "Logout");

echo "<p>You are now logged out.</p>";
echo "<p>Thank you for using this site.</p>";

echo "<hr>";

print "<p><a href=\"index.php\">Log in again!</a></p>";

ob_end_flush();
?>


