<?php





session_start();

if (isset($_SESSION['loggedin']) && $_SESSION["loggedin"] === true) {
    header("location: config.php");
}

// CHECK SESSION OF EXISTING LOGIN-------------

$username = null;
$password = null;
$username_err = $password_err = $login_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (empty(trim($_POST["username"]))) { // CHECK IF USERNAME IS EMPTY
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    if (empty(trim($_POST["password"]))) { // CHECKS IF PASSWORD IS EMPTY
        $password_err = "Please enter password.";
    } else {
        $password = trim($_POST["password"]);
    }

    if (isset($username) && isset($password)) {

        header("location: config.php");

    } else {

        header('WWW-Authenticate: Basic realm="Restricted Area"');
        header('location: templates/auth.html.php');
        //  die("Please enter your username and password");

    }

} else {

    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('location: templates/auth.html.php');

}
