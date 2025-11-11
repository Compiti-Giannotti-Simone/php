<?php
include("./table.php");
session_start();
if(isset($_POST["table_num"]) && isset($_POST["inputPlate"])) {
    $plate = $_POST["inputPlate"];
    $table_num = intval($_POST["table_num"]);
    $_SESSION["tables"][$table_num]->add_plate($plate);
    header("Location: manage_table.php?table_num=" . urlencode($table_num));
}
if (isset($_GET["table_num"])) {
    $table_num = intval($_GET["table_num"]);
    if ($_SESSION["tables"][$table_num]->waiter != $_SESSION["user"]) {
        $error = "Il tavolo non è tuo";
        header("Location: manage.php?error=" . urlencode($error));
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <?php include "../head.php" ?>
</head>

<body class="">
    <h1 class="text-center">Tavolo </h1>
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
    <div class="container w-50">
        <div class="row">
            <div class="card col-12">
                <div class="card-body">
                    <?php
                    if (count($_SESSION['tables'][$table_num]->plates) == 0) {
                        echo "<p>Il tavolo non ha piatti.</p>";
                    } else {
                        echo "<ul class='list-group'>";
                        foreach ($_SESSION['tables'][$table_num]->plates as $plate => $amount) {
                            echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
                            echo htmlspecialchars($plate);
                            echo "<span class='badge bg-primary rounded-pill'>" . htmlspecialchars($amount) . "</span>";
                            echo "</li>";
                        }
                        echo "</ul>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <form class="m-auto container w-50 my-3" action="" method="post">
            <div class="row">
                <div class="mb-3 col-12">
                    <label for="inputPlate" class="form-label">Piatto</label>
                    <input required type="text" class="form-control" name="inputPlate" id="inputPlate">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-12">
                    <?php
                    echo "<input type='hidden' name='table_num' value='$table_num'>"
                    ?>
                    <button type="submit" class="col-12  m-auto btn btn-primary" name="loginButton">Aggiungi piatto</button>
                </div>
            </div>
            </div>
        </form>
    </div>





    <?php include "../scripts.php" ?>
</body>

</html>