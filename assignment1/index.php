<?php
/* Author: Marcus Anthony
 * Date: June 4, 2015
 * File name: index.php
 * File description: home login page
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>COMP 1920 Assignment 1 by Marcus Anthony Cyganiak</title>
    
    <style>

	.right { float: right; clear: both; margin: 0; padding: 0; }
	label { margin: 0; padding: 0; }
	fieldset { width: 225px; }
	
	</style>

</head>
<body>
    <?php
    $flag = 0;
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") //if post method is called
    {
    
    $user = ($_POST["u"]); //getting the username from the post
    if (strpos($user,"<") !== false) 
    { //refining the input recieved
    $flag = 1;
    $user = trim($user);
    $user = stripslashes($user);
    }
    else
    {
    $pass = ($_POST["p"]);//if username matches then matching the pasword obtained from the input
    $pass = trim($pass);
    $pass = stripslashes($pass);
    if(check_auth(get_auth(),$user,$pass)==true) // if matches then forwarded to the next page
    {
    echo "Yes";
    header("Location:browse-books-in-store.php");
    }
    else
    { //else recorded and directed back to the index page
    $file = "invalid-logins.txt";
    $person = $user . ",".$pass .",". $_SERVER["REMOTE_ADDR"].PHP_EOL;
    
    file_put_contents($file, $person, FILE_APPEND | LOCK_EX);
    echo "Invalid user/login. This has been logged along with your IP address ".$_SERVER["REMOTE_ADDR"] ;
    }
    }
    }
    function get_auth()
    {
    //setting up the array of username and passwords
    $users = file("passwords.txt");
    function split_auth(&$value){
    $value = explode(",",$value);
    }
    
    array_walk($users,"split_auth");
    return $users;
    }
    function test_input($data)
    { //filtering and cleaning the input recieved
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
    function check_auth($users,$username,$password)
    {
    //checking the authorization of the user.
    foreach($users as $temp)
    {
    if($temp[0]==$username && test_input($temp[1])==$password)
    {
    return true;
    }
    setcookie("uname", $username, time()+1200);
    setcookie("loggedintime", time());
    
    }
    return false;
    }
    
    
    ?>
    <form name="form1" method="post" action="index.php">
    <fieldset >
    <input type="hidden" name="submitted" id="submitted" value="1"/>
    <label for="Username">Username:</label>
    <input class="right" type="text" name="u" id="u" />
    <label for="Password">Password:</label>
    <input class="right" type="password" name="p" id="p"/>
    <label>Remember Me:</label>
    <input type="checkbox" name="remember" <?php if(isset($_COOKIE["remember_me"])) {
            echo "checked=\"checked\"";
        }
        else {
            echo "";
        }
        ?> >
    <br><br>
    <input class="right" type="submit" name="Submit" value="Submit Query" />
    </fieldset>
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    if($flag==1)
    {
    echo " {$user} contains illegal characters; try again";
    }
    }
    ?>
</body>
</html>
