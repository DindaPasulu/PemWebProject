<?php
/**
 * using mysqli_connect for database connection
 */
$host = "localhost";
$username = "root";
$dbname = "foodland";
$password = "";

$mysqli = new mysqli($host, $username, $password, $dbname) or die ($mysqli->connect_error); 
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }


?>