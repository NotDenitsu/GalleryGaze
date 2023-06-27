<?php
$servername = "localhost";
$database = "gallerygaze";
$name = "root";
$password = "";
global $connection;
try {
  $connection = new PDO("mysql:host=$servername;dbname=$database", $name, $password);
  // set the PDO error mode to exception
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e) {
  //echo "Connection failed: " . $e->getMessage();
}
?>