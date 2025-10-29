<?php
session_start();

$username = "Admin";
$password = "pass1234";
$_SESSION["username"] = $_POST["inputUsername"];
$_SESSION["password"] = $_POST["inputPassword"];
if($_SESSION["username"] === $username && $_SESSION["password"] === $password) {
    header("Location: home.php");
}
else {
    $error = "Username o password errati";
    session_destroy();
    header("Location: index.php?error=" . urlencode($error));
    exit();
}

?>