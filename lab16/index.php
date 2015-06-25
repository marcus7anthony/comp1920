<?php
ob_start();
/*
Author: Marcus Anthony
File: index.php
Version: 1.0
Last modified: June 11, 2015
*/
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ( (!empty($_POST["username"])) && (!empty($_POST["password"])) ) {
		if ( (strtolower($_POST["username"]) == "comp1920") && ($_POST["password"] == "comp1920") ) { //Validate
	
			//Session control
			session_start();
			header("Cache-Control: no-store, no-cache, must-revalidate,post-check=0,pre-check=0,private");
			header("Pragma:no-cache");

			$_SESSION["username"] = $_POST["username"];
			$_SESSION["logintime"] = time();
			$_SESSION["valid"] = TRUE;
			
			//Redirect the user to the home page
			ob_end_clean();
			header ("Location: home.php");
			exit();
		
		} else { //Invalid
			print "<p>Your submitted username and password do not our reecords. Please go back and try again.</p>";
		}
	
		} else { //Forgot to fill in a field
			print "<p>Please make sure you enter both a username and a password. Go back and try again.</p>";
		}
	
} else { //Display form
print "<h1>Login Form</h1>"; ?>

<form action="index.php" method="post">
<p>Username: <input type="text" name="username" size="20" value="<?php if (isset($_POST["username"])) { print htmlspecialchars($_POST["username"]); } ?>"/></p>
<p>Password: <input type="password" name="password" size="20" value="<?php if (isset($_POST["password"])) { print htmlspecialchars($_POST["password"]); } ?>"/></p>
<p><input type="submit" name="submit" value="Log In" /></p>
</form>

<?php
}
ob_end_flush();
?>
