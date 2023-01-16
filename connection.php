<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>



<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "webtech_database";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

?>






</body>
</html>
