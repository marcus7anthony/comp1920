<style>
table, th, td { border: 2px ridge; }
tr:nth-child(odd) { background-color: #faebd7; }
</style>
<?php
/* Author: Marcus Anthony
* Date: June 4, 2015
* File name: browse-books-in-store.php
* File description: bookstore inventory
*/
if(isset($_COOKIE["uname"])) 
{
$i = 0;
$lines = file("books.txt", FILE_IGNORE_NEW_LINES);//reading the file for the input
$FinalArray = array();
foreach($lines as $temp)
{
$person = $temp;
$keywords = preg_split("/(by|published|born) /", $temp); //splitting the file
if ($keywords[2]=="")
{
$file = "missing-publishing-year.txt"; //adding records with missing publishing year
file_put_contents($file, $person, FILE_APPEND | LOCK_EX);
}

else if($keywords[3]=="")
{
$file = "missing-birth-year.txt"; //adding records with missing birth year
file_put_contents($file, $person, FILE_APPEND | LOCK_EX);

}
else if($keywords[2]<$keywords[3])
{
$file = "published-before-born.txt"; //adding records with records having birth year after publication.
file_put_contents($file, $person, FILE_APPEND | LOCK_EX);
}
else
{
$path = explode(" ", $keywords[1]); //exploding the name of the author
$keywords = array($keywords[0],$path[0],$path[1],$keywords[2],$keywords[3]);
array_push($FinalArray,$keywords);
}
}
function cmp($a, $b)
{
return strcmp($a[3], $b[3]); //comparing the publishing year of the records
}
uasort($FinalArray,"cmp");
//printing the output to the page
echo "<table><tr><th>Title</th><th>published</th><th>Author last name</th><th>Author first Name</th><th>Birth Year</th></tr>";
foreach($FinalArray as $temp)
{
if($i%2==0)
{
echo "<tr><td>".$temp[0]."</td><td>".$temp[3]."</td><td>".$temp[1]."</td><td>".$temp[2]."</td><td>".$temp[4]."</td></tr>";
}
else
echo "<tr><td>".$temp[0]."</td><td>".$temp[3]."</td><td>".$temp[1]."</td><td>".$temp[2]."</td><td>".$temp[4]."</td></tr>";
$i =$i+1;
}
echo "</table>";

$time = time() - $_COOKIE["loggedintime"]; //checking duration of cookie
echo "<hr>";
echo "<p>" . "Welcome " . $_COOKIE["uname"] . "!" . "</p>";
echo "<p>" . "You have been logged in for " . $time . " seconds<br>" . "</p>";
echo "<ul><li><a href =\"browse-books-in-store.php\">Browse books in store</a></li>";
echo "<li><a href =\"book-analytics.php\">Books analytics</a></li>";
echo "<li><a href =\"Logout.php\">Log out</a></li></ul>";

} 
else
echo "You must <a href =\"index.php\">log in</a> first";
?>
