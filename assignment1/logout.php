<?php
/* Author: Marcus Anthony
 * Date: June 4, 2015
 * File name: logout.php
 * File description: logout and return to index page
 */
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>COMP 1920 Assignment 1 by Marcus Anthony Cyganiak</title>
</head>
<body>
<?php

// Delete all cookies related to 'uname'

// Define variable to store past time
$past = time()-1;

// If the user cookie is set, then delete cookies
if (isset($_COOKIE['uname'])){
    setcookie("uname", $_COOKIE['uname'], $past);
    setcookie("loggedintime", '', $past);
    setcookie("remember", '', $past);
}

// Print out message to log in
echo "<p>You can <a href='index.php'>log in</a> again</p>";
ob_end_flush();
?>
</body>
</html>
