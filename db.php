<?php
session_start();

// $conn = mysqli_connect(
//   'localhost',
//   'root',
//   '',
//   'php_mysql_crud'
// )



// or die(mysqli_erro($mysqli));

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "php_mysql_crud";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    echo "";
}

?>
