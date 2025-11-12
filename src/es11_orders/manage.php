<?php
include("./table.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <?php include "../head.php" ?>
</head>

<body class="">
    <h1 class="text-center">Seleziona tavolo</h1>
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
    <?php
    echo "<h3 class='text-center'>Utente: " . $_SESSION["user"] . "</h3>"
        ?>
    <div class="text-center mb-3">
        <a href="./logout.php" class="btn btn-sm btn-secondary me-2">Logout</a>
        <a href="./end_day.php" class="btn btn-sm btn-danger">Finisci giornata</a>
    </div>
    <h2 class="text-center">Tavoli liberi</h2>
    <div class="container">
        <div class='row row-cols-4'>
            <?php
            for ($i = 0; $i < sizeof($_SESSION["tables"]); $i++) {
                $price = number_format($_SESSION["tables"][$i]->calculate_price(), 2) . " €";
                $title = "Tavolo " . strval($i);
                $plates_num = array_sum($_SESSION["tables"][$i]->plates);
                $waiter = $_SESSION["tables"][$i]->waiter == "" ? "Nessuno" : $_SESSION["tables"][$i]->waiter;
                if ($waiter == "Nessuno") {
                    $disabled = "";
                } else {
                    $disabled = "disabled";
                }
                echo "<div class='col-3 my-4'>";
                echo "
                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title'>$title</h5>
                        <p class='card-text'>Cameriere: $waiter</p>
                        <p class='card-text'>Piatti: $plates_num</p>
                        <p class='card-text'>Totale: $price</p>
                        <form action='claim_table.php' method='post' class='d-inline'>
                            <input type='hidden' name='table_num' value='$i'>
                            <button $disabled type='submit' class='btn btn-primary'>Prendi</button>
                        </form>
                    </div>
                </div>
                ";
                echo "</div>";
            }
            ?>
        </div>
    </div>

    <h2 class="text-center">I tuoi tavoli</h2>

    <div class="container">
        <div class='row row-cols-4'>
            <?php
            $user_tables = 0;
            for ($i = 0; $i < sizeof($_SESSION["tables"]); $i++) {
                if ($_SESSION["tables"][$i]->waiter == $_SESSION["user"]) {
                    $user_tables++;
                    $price = number_format($_SESSION["tables"][$i]->calculate_price(), 2) . " €";
                    $title = "Tavolo " . strval($i);
                    $plates_num = array_sum($_SESSION["tables"][$i]->plates);
                    $total_price = $price;
                    $waiter = $_SESSION["tables"][$i]->waiter ?? "Nessuno";
                    echo "<div class='col-3 my-4'>";
                    echo "
                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title'>$title</h5>
                        <p class='card-text'>Piatti: $plates_num</p>
                        <p class='card-text'>Totale: $price</p>
                        <form action='manage_table.php' method='get' class='d-inline'>
                            <input type='hidden' name='table_num' value='$i'>
                            <button type='submit' class='btn btn-primary'>Gestisci</button>
                        </form>
                    </div>
                </div>
                ";
                    echo "</div>";
                }
            }

            ?>
        </div>
        <?php
        if ($user_tables == 0) {
            echo "<h5 class='text-center'>Non hai ancora preso in carico nessun tavolo.</h5>";
        }
        ?>
    </div>




    <?php include "../scripts.php" ?>
</body>

</html>