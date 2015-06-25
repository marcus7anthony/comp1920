<?php
/* Author: Marcus Anthony
 * Date: June 4, 2015
 * File name: cookies-a.php
 * File description: an HTML form, demonstrating how PHP cookies operate
 */
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Lab 14: Working with Cookies - Marcus Cyganiak</title>
</head>

<body>
	<?php if (!(isset($_COOKIE["firstname"]))) { ?>
    
    <form name="form" method="post" action="cookies-b.php">
    First Name:<input type="text" name="firstname"><br><br>
    Last Name:<input type="text" name="lastname"><br><br>
    RED: <input type="radio" name="color" value="red"><br><br>
    BLUE: <input type="radio" name="color" value="blue"><br><br>
    YELLOW: <input type="radio" name="color" value="yellow"><br><br>
    GREEN: <input type="radio" name="color" value="green"><br><br>
    <input type="submit" name="submit" value="Submit"><br>
    </form>
    
    <?php } 
    else 
    {
    $color = $_COOKIE["color"];
    $firstname = $_COOKIE["firstname"];
    $lastname = $_COOKIE["lastname"];
    echo "<body bgcolor = \"$color\"> Hello $firstname $lastname";
    }
    ?>
</body>
</html>
