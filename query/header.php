<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "youtube_db";

//create connection
$connection = mysqli_connect($servername, $username, $password, $db) or die("Error " . mysqli_error($connection));
echo "Connected". "<br>";
?>