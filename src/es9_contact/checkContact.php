<?php 
$missing = [];

if (!isset($_POST["inputName"]) || empty($_POST["inputName"])) {
    $missing[] = "Name";
}
if (!isset($_POST["inputSurname"]) || empty($_POST["inputSurname"])) {
    $missing[] = "Surname";
}
if (!isset($_POST["inputEmail"]) || empty($_POST["inputEmail"])) {
    $missing[] = "Email";
}

if (!empty($missing)) {
    $error = implode(", ", $missing) . " is required";
    header("Location: index.php?error=" . urlencode($error));
    exit();
}
    
?>