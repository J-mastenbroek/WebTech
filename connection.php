<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$dbUsername = "mitchb";
$dbPassword = "FSSbbuztalQlumSMqfEnYXRzTjXxMuNm";
$dbName = "webtech";

// Create connection
global $conn;
$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>






</body>
</html>
