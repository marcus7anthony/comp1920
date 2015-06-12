<?php
/*
Author: Marcus Anthony
File: read_post.php
Version: 1.0
Last modified: May 21, 2015
*/

if(isset($_POST["submit"]))	
{
	$selected = $_POST["option"];
	
	if ($selected == "read")
	{
		header("Location: ./read.php"); 	// redirects browser
		
		exit; // code below not executed after redirect
	}
	else if ($selected == "post")
	{
		header("Location: ./get_text.php");
	}
}

?>
