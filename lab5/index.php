<?php
/*
Author: Marcus Anthony
File: index.php
Version: 1.0
Last modified: May 7, 2015
*/

echo "<h1>Lab 5 Assignment</h1>";
echo "<ol><li>"; //begin ordered list

date_default_timezone_set("America/Vancouver"); //local time in Vancouver
echo date("l, F j, Y"); //the date the script is running

echo "</li>";
echo "<br>"; //create a break in between ordered list items
echo "<li>";

echo "Today is " . date("l, F j, Y"); // date with pre-text shown

echo "</li>";
echo "<br>";
echo "<li>";

$today = date("j"); //j represents the numbered day of the month
if($today&1) //parses number to be odd or even
{
	echo "$today " . "is an odd number.";
}
else 
{
	echo "$today " . "is an even number.";
}

echo "</li>";
echo "<br>";
echo "<li>";

$squared = 9;
$root = sqrt($squared); //root will equal 3

echo "$root " . "squared is " . "$squared" . ":"; //3 squared is 9

echo "<br>";
echo "<br>";

for ($num = 0; $num < $squared + 1; ++$num) //begin loop at zero, show up to squared, plus one b/c 5 not included
{
    if ($num == 5) //do not include number 5 in loop
        continue;
    print "$num" . "<br>";
}

echo "</li>";
echo "<br>";
echo "<li>";

if ($squared > 100)
{
	echo "You will have a lucky day"; //if squared is greater than 100
}
else
{
	echo "You will have an ordinary day"; //if squared is less than 100
}

echo "</li>";
echo "<br>";
echo "<li>";

$end = "end of file";
$end = ucfirst($end); //capitalize first word of sentence
echo "$end";

echo "</li></ol>"; //end ordered list

?>
