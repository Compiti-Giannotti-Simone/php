<?php
session_start();
$_SESSION["user"] = "";
$_SESSION["password"] = "";
header("Location: index.php");
exit();
?>