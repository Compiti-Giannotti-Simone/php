<?php
session_start();
if(isset($_POST["clearSession"])) {
    session_destroy();
    header("Location: ".$_SERVER["PHP_SELF"]);
    exit();
}
if(!isset($_SESSION["counter"])) {
    $_SESSION["counter"] = 1;
}
else {
    $_SESSION["counter"]++;
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <?php include "../../head.php" ?>
</head>

<body class="">
    <h1 class="text-center">Contatore sessione</h1>

    <?php
    echo "<p class='text-center'> Hai visitato questa sessione {$_SESSION['counter']} volte!";
    ?>

    <form class="text-center m-auto container" action="" method="post">
        <button type="submit" class="btn btn-primary" name="reload">Aggiorna pagina</button>
        <button type="submit" class="btn btn-primary" name="clearSession">Resetta sessione</button>
    </form>

    <?php include "../../scripts.php" ?>
</body>

</html>