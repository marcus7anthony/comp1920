<?php
/*
Author: Marcus Anthony
File: index.php
Version: 1.0
Last modified: May 21, 2015
*/

$target_dir = "lab12/";
$target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
$uploaded = 1;
$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if text file is real
if(isset($_POST["submit"])) {
    $check = $_FILES["fileUpload"]["tmp_name"];
    if($check !== false) {
        $uploaded = 1;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploaded = 0;
}
// Allow certain file formats
if($fileType != "txt") {
    echo "Sorry, only files ending with .txt are allowed.";
    $uploaded = 0;
}
echo "<br>";
// Check if $uploaded is set to 0 by an error
if ($uploaded == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
if ($uploaded = opendir("lab12/")) {
	echo "<pre>";
	var_dump($_FILES);
    }

?>
