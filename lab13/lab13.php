<?php

/* File: lab13.php
Author: Marcus Anthony
Last modified: May 28, 2015 */

/* This file contains regular expressions for a form on lab13.html */

error_reporting(E_ERROR | E_PARSE);

if(isset($_GET["submit"]))	
{
	// 7-digit Phone Number
	$phone = $_GET["phone"]; 
	$phoneValid = "/^\d{3}[\s-]*\d{4}$/i"; //1st 3 digits are 1 group; can be followed w/ dash, space, or nothing before next 4 digits -- totalling 7 digits
	
	if(preg_match($phoneValid, $phone))
	{
		echo "Phone Number: $phone";
	}else{
		echo "<span style=\"color:red\">404 error. You entered an invalid phone number. Please try again.</span>";
	}
	
	echo "<br>";
	
	//License Plate Number
	$license = $_GET["license"];
	$licenseValid = "/[A-Z]{3}\s?[0-9]{3}|[0-9]{3}\s?[A-Z]{3}/"; //requires uppercase in 1st set of 3 letters or latter set of 3 letters; opposite 3 characters are required to be digits (numbers)
	
	if(preg_match($licenseValid, $license))
	{
		echo "License Plate: $license";
	}else{
		echo "<span style=\"color:red\">404 error. You entered an invalid driver's license plate number. Please try again.</span>";
	}
	
	echo "<br>";
	
	// Street Address
	$street = $_GET["street"];
	$streetValid = "/^[\d]{3,5}[\s]?[a-z].+Street$/i"; //3-5 number address, plus string, plus word "Street" is required
	
	if(preg_match($streetValid, $street))
	{
		echo "Address: $street";
	}else{
		echo "<span style=\"color:red\">404 error. You entered an invalid street address. Please try again.</span>";
	}
	
	echo "<br>";
	
	//Birthday
	$birthday = $_GET["birthday"];
	$birthdayValid = "/^[a-z]{3}[-]?[\d]{2}[-]?[\d]{4}$/i"; //formats MMM(ie.Jul)-09-1989, where the year cannot go past 2015
	$currentDate = date("M-d-Y");
	
	if(strtotime($birthday) > strtotime($currentDate))
	{
		echo "Error. Invalid Birthday. Try Again.";
	}
	
	if(preg_match($birthdayValid, $birthday))
	{
		echo "Birthday: $birthday";
	}else{
		echo "<span style=\"color:red\">404 Error. You entered an invalid birthday. Please try Again.</span>";
	}
	
	echo "<br>";
	
	//SIN
	$sin = $_GET["sin"];
	$sinValid = "/^\d{3}[\s]*[\d]{3}[\s]*[\d]{3}$/"; //9 digits, can have zeros, and a space after each set of 3 digits
	
	if(preg_match($sinValid, $sin))
	{
		echo "SIN: $sin" . "<br>" . "<br>" . "Thank you for your submission!";
	}else{
		echo "<span style=\"color:red\">404 Error. You entered an invalid SIN. Please try again.</span>";
	}
}	
?>
