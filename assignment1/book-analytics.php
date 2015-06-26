<style>
span { color: red; }
</style>
<?php
/* Author: Marcus Anthony
* Date: June 4, 2015
* File name: book-analytics.php
* File description: stats on bookstore inventory
*/
if(isset($_COOKIE["uname"])) 
{
$lines = file("books.txt", FILE_IGNORE_NEW_LINES);
$FinalArray = array();
foreach($lines as $temp)
{
$person = $temp;
//develop array for the processing
$keywords = preg_split("/(by|published|born) /", $temp);
if ($keywords[2]=="")
{
}

else if($keywords[3]=="")
{
}
else if($keywords[2]<$keywords[3])
{

}
else
{
$keywords = array($keywords[0],$keywords[1],$keywords[2],$keywords[3]);
array_push($FinalArray,$keywords);
}
}

$count = array();
foreach($FinalArray as $one)
{
@$count[$one[1]]++;
}
function cmp($a, $b)
{
return strcmp($a[0], $b[0]);
}
uasort($count,"cmp"); // highest num of books author 

$most_books = end($count);
$most_books_author = key($count);

//find oldest author
$maxAge=0;
$author = "";
foreach($FinalArray as $one)
{
if(($one[2]-$one[3])>$maxAge)
{
$maxAge = $one[2]-$one[3];
$author = $one[1];
}
}

//find max length title of the array records
$maxtitle=0;
$bookname = "";
foreach($FinalArray as $one)
{
if(strlen($one[0])>$maxtitle)
{
$maxtitle = strlen($one[0]);
$bookname= $one[0];
}
}   
$bookspub=0;
$publish_book = array();
foreach($FinalArray as $one)
{
if(($one[2])<1950)
{
$bookspub++;
array_push($publish_book,$one[0]);
}
}
$time = time() - $_COOKIE["loggedintime"]; //checking duration of cookie
echo "<p>" . "Welcome " . $_COOKIE["uname"] . "!" . "</p>";
echo "<p>" . "You have been logged in for " . $time . " seconds<br>" . "</p>";
//print all data required
echo "<p><span>" . $most_books_author . "</span> wrote the maximum number of books <span> ($most_books books)</span></p>" ;
echo "<p><span>" . $author . "</span> was the oldest author <span>($maxAge years)</span>" ;
echo "<p><span>" . $bookname . "</span> is the longest title <span>($maxtitle letters)</span>" ;
echo "<p><span>" . $bookspub . " books</span> were published before 1950 <span>(" ;
foreach($publish_book as $pub)
{ 
echo trim("$pub") . ", ";
}
echo ")</span></p>";

echo "<hr>";
//prin navigation pages
echo "<ul><li><a href =\"browse-books-in-store.php\">Browse books in store</a></li>";
echo "<li><a href =\"book-analytics.php\">Books analytics</a></li>";
echo "<li><a href =\"Logout.php\">Log out</a></li></ul>";
}
else
echo "You must <a href =\"index.php\">log in</a> first"; //if user is not logged in
?>
