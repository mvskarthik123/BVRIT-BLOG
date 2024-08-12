<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog_wad";


$conn = mysqli_connect($servername, $username, $password, $dbname,3307);
if (!$conn) {
    die("Something went wrong;");
}

?>