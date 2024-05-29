<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "your_database_name";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn) {
  echo "Connection successful";
} else {
  error_log("Connection error: " . mysqli_connect_error());

  echo "Error connecting to the database.";
}
?>
