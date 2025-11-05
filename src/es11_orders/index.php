<?php
session_start();
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
if(!isset($_SESSION['username'])) {
    $_SESSION['user'] = "";
}
if(!isset($_SESSION['password'])) {
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
    if (isset($_SESSION["user"] && isset($_SESSION["password"]))) {
        header("Location: manage.php");
    }
    ?>

    

    <div class="text-center m-auto">
        
    </div>

    <?php include "../scripts.php" ?>
</body>

</html>