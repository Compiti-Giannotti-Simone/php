<?php
include("./table.php");
session_start();
if(!isset($_SESSION["tables"])) {
    $_SESSION["tables"] = array();
    for ($i=0; $i < 8; $i++) { 
        $_SESSION["tables"][$i] = new Table($i);
    }
}
if (isset($_SESSION["user"]) && isset($_SESSION["password"]) && $_SESSION["user"] != "" && $_SESSION["password"] != "") {
    header("Location: manage.php");
}
$_SESSION["user_list"] = [
    "user1",
    "user2",
    "user3",
    "user4"
];
$_SESSION["password_list"] = [
    "pass1",
    "pass2",
    "pass3",
    "pass4"
];
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = "";
}
if (!isset($_SESSION['password'])) {
    $_SESSION['password'] = "";
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <?php include "../head.php" ?>
</head>

<body class="">
    <h1 class="text-center">Login</h1>

    <?php
    if (isset($_GET["error"])) {
        $error = $_GET["error"];
        echo "
        <div class='m-auto my-3 w-25 alert alert-danger' role='alert'>
            $error
        </div>
        ";
    }
    ?>

    <form class="m-auto container w-25" action="login.php" method="post">
        <div class="row">
            <div class="mb-3 col-6">
                <label for="inputUsername" class="form-label">Username</label>
                <input required type="text" class="form-control" name="inputUsername" id="inputUsername">
            </div>
            <div class="mb-3 col-6">
                <label for="inputPassword" class="form-label">Password</label>
                <input required type="password" class="form-control" name="inputPassword" id="inputPassword">
            </div>
        </div>
        <div class="row">
            <button type="submit" class="col-12 w-25 m-auto btn btn-primary" name="loginButton">Login</button>
        </div>
    </form>

    </div>

    <?php include "../scripts.php" ?>
</body>

</html>