<?php
/* Author: Marcus Anthony
 * Date: June 4, 2015
 * File name: form.php
 * File description: illustrating how cookies are used with a form
 */
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Lab 15: Working with Cookies - Marcus Cyganiak</title>
</head>

<body>
    <?php 
	error_reporting(E_ERROR | E_PARSE);
	if (!(isset($_COOKIE["emailAddress"]))){ //if cookie is set
	?>
    
    <form method="post" action="form.php">
    	Please enter your email: <input name="mail" type="email">
    	<input type="submit">
    </form>
    
    <?php } else {
	echo "Welcome back " . $_COOKIE["emailAddress"]; }

	if (!(isset($_COOKIE["emailAddress"]))){
		setcookie("emailAddress", $_POST["mail"], (time() + (60 * 10)));
		echo $_POST["mail"]; //upon return to page, this message is echoed from emailAddress cookie that was set
	}
	?>
</body>
</html>
