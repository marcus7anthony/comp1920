<?php
/*
Author: Marcus Anthony
File: lab8.php
Version: 1.0
Last modified: May 14, 2015
*/

error_reporting(0);
ini_set("display_errors", 0);

//last name

foreach($_POST as $post)
{
	if(!isset($post["last"]))
	{
		echo "Please type a last name";
		
	}
	
echo "<br>";

//password

if (isset($_POST["number"])){
	if ($_POST["number"] !== "comp1920");
	echo "<br>";
	} if (empty($_POST["number"])){
	echo "Please type a password."; }
	elseif (!($_POST["number"] === "comp1920")){
	echo "Invalid password, sorry"; }

echo "<br>";
echo "<br>";

//sport

$sport = "$_POST[sport]";
print "$sport";

echo "<br>";
echo "<br>";

//province

if ($_POST["provinces"] == "bc") {
	echo strtoupper("isn't the ocean wonderful?"); }
	
if ($_POST["provinces"] == "pei") {
	echo strtoupper("isn't the ocean wonderful?"); }

echo "<br>";
echo "<br>";
	
if(!isset($post["junk"]))
{
	echo "Junk mail will now be sent to you in perpetuity, thank you.";
}

echo "<br>";
echo "<br>";

break (2);
	
}

?>
