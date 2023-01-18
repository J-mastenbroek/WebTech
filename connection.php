<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$username = "mitchb";
$password = "FSSbbuztalQlumSMqfEnYXRzTjXxMuNm";
$dbName = "webtech";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>






</body>
</html>
