<?php
/* Author: Marcus Anthony
 * Date: June 4, 2015
 * File name: cookies-b.php
 * File description: action file for form on cookie-a.php
 */
error_reporting(E_ERROR | E_PARSE);
if (!(isset($_COOKIE['firstname']))) { setcookie("firstname", $_POST["firstname"], time()+ 60); }
if (!(isset($_COOKIE['lastname']))) { setcookie("lastname", $_POST["lastname"], time()+ 60); }
if (!(isset($_COOKIE['color']))) { setcookie("color", $_POST["color"], time()+ 60); }

if(isset($_POST["submit"]))
{
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$color = $_POST["color"];
	//if hits submit with name field empty, prompt user to go back and enter required names
	if((empty($firstname) == true) || (empty($lastname)== true))
	{
		echo "Please go back and enter both your first and last name.";
	}
	//with required names, but no radio button selected, leave background white
	if((empty($firstname) != true) && (empty($lastname)!= true) && (isset($color) != true))
	{
		echo "Hello $firstname $lastname";
	}
	
	//change background color with names when all firstname, lastname, and color are selected
	if((empty($firstname) != true) && (empty($lastname)!= true) && (isset($color) == true))
	{
		echo "<body bgcolor = \"$color\"> Hello $firstname $lastname";
	}
}	
?>
