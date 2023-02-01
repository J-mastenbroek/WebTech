
<?php
    include_once 'connection.php';
if (isset($_POST["submit"])) {

    $name = mysqli_real_escape_string($conn, $_POST["fullname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $username = mysqli_real_escape_string($conn, $_POST["uid"]);
    $pwd = mysqli_real_escape_string($conn, $_POST["pwd"]);
    $pwdRepeat = mysqli_real_escape_string($conn, $_POST["pwdrepeat"]);

    require_once 'connection.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false) {
        header("location: signup.php?error=emptyinput");
        exit();
    }

    if (invalidUid($username) !== false) {
        header("location: signup.php?error=invaliduid");
        exit();
    }

    if (tooLongUsername($username) !== false) {
        header("location: signup.php?error=usernametoolong");
        exit();
    }


    if (invalidEmail($email) !== false) {
        header("location: signup.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: signup.php?error=passworddontmatch");
        exit();
    }

    if (uidExists($conn, $username, $email) !== false) {
        header("location: signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $email, $username, $pwd);

}

else {
    header("location: signup.php");
    exit();
}
?>