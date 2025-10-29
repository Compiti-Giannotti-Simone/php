<?php
session_start();
if(!isset($_SESSION["username"]) || !isset($_SESSION["password"])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <?php include "../../head.php" ?>
</head>

<body class="">
    <h1 class="text-center">Home</h1>

    <div class="text-center">
        <p class="">Benvenuto admin!</p>
        <a href="./logout.php" class="btn btn-danger">Logout</a>
    </div>

    <?php include "../../scripts.php" ?>
</body>

</html>