<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <?php include "../head.php" ?>
</head>

<body class="">
    <h1 class="text-center">Dati inseriti:</h1>
    <div class="w-75 m-auto text-center">
    <div class="w-25 m-auto text-center">
    <?php
    if(isset($_GET["error"])) {
        $error = $_GET["error"];
        echo "
        <div class='m-auto my-3 w-25 alert alert-danger' role='alert'>
            $error
        </div>
        ";
    }
    echo "<ul class='list-group'>";
    foreach ($_SESSION as $key => $value) {
        echo "<li class='list-group-item'>$key : $value</li>";
    }
    echo "</ul>";
    ?>
    </div>
    </div>
    <div class="m-auto text-center my-4">
        <a href="./reset.php" class="btn btn-danger text-center">Cancella dati</a>
    </div>

    

    <?php include "../scripts.php" ?>
</body>

</html>