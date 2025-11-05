<?php
session_start();

for ($i=0; $i < ; $i++) { 
    if($_POST["inputUsername"] == $_SESSION["user_list"][i] && $_POST["inputPassword"] == $_SESSION["password_list"][i]) {
        $_SESSION["user"] = $_POST["inputUsername"];
        $_SESSION["password"] = $_POST["inputPassword"];
        header("Location: manage.php")
    }
}
    $error = "Username o password errati";
    header("Location: index.php?error=" . urlencode($error));
    exit();
}

?>