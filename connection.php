<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$dbUsername = "mitchb";
$dbPassword = "FSSbbuztalQlumSMqfEnYXRzTjXxMuNm";
$dbName = "webtech";

// Create connection
$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>






</body>
</html>
