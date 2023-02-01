
<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {

    $result;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;

}


function invalidUid($username) {

    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;

}

function tooLongUsername($username) {

    $result;
    if (strlen($username) > 16) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;

}

function invalidEmail($email) {

    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;

}


function pwdMatch($pwd, $pwdRepeat) {

    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;

}


function uidExists($conn, $username, $email) {

    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_Get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
    }

    return $result;

    mysqli_stmt_close($stmt);
}



function createUser($conn, $name, $username, $email, $pwd) {

    $sql = "INSERT INTO users (fullname, username, email, password, role) VALUES (?, ?, ?, ?, 'gast');";
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: signup.php?error=stmtfailed");
        exit();
    }


    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: signup.php?error=none");
    
}


// login
function emptyInputLogin($username, $pwd) {

    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;

}

function loginUser($conn, $username, $pwd) {
    # 2x username, omdat het bij de sql query OR heeft, dus plakt ze in 1 vd 2
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false) {
        header("location: login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["password"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: signup.php?error=wronglogin");
        exit();
    }
    elseif ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersID"];
        $_SESSION["useruid"] = $uidExists["username"];

        // potentiele sessie voor role
        $stmt = $conn->prepare("SELECT role FROM users WHERE username = ?;");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($role);
        $stmt->fetch();

        $_SESSION["role"] = $role;


        header("location: index.php");

        //Set auto fill in username cookie
        setcookie("username", $_SESSION["useruid"], time()+30*24*60*60);

        exit();
    }
}


// functie voor het regelen van orders
function add_order($conn, $usersID, $orderprice, $beschrijving) {

    $sql = "INSERT INTO orders (usersID, orderprice, beschrijving) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: signup.php?error=stmtfailed");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "ids", $usersID, $orderprice, $beschrijving);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


}


// functie voor het verlagen van de stock na de bestelling
function lower_stock($conn, $new_stock, $productID) {

    $sql = "UPDATE `products` SET `in_stock`= ? WHERE productID = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: signup.php?error=stmtfailed");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "ii", $new_stock, $productID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


}