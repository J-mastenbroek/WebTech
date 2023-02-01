<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shop</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
    </head>
    <body>
        <script src="scripts/api-client.js"></script>

<?php
// info uit tabel products
$stmt = $conn->prepare("SELECT fullname, usersID, email FROM users WHERE productID = ?;");
$stmt->bind_param("i", $SESSION['userid']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($fullname, $userID, $email);
$stmt->fetch();

?>    
    </body>
</head>