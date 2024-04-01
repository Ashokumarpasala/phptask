Get your own PHP Server
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "phptask";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

return $conn;
?>