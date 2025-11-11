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
    <h1 class="text-center">Tavoli liberi</h1>
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
    <div class="container">
        <div class='row row-cols-4'>
        <?php
            for ($i= 0; $i < sizeof($_SESSION["tables"]) ; $i++) {
                $title = "Tavolo " . strval($i);
                $plates_num = sizeof($_SESSION["tables"][$i]->plates);
                $waiter = $_SESSION["tables"][$i]->waiter == "" ? "Nessuno" : $_SESSION["tables"][$i]->waiter;
                if($waiter == "Nessuno") {
                    $disabled = "";
                }
                else { 
                    $disabled = "disabled";
                }
                echo"<div class='col-3 my-4'>";
                echo"
                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title'>$title</h5>
                        <p class='card-text'>Cameriere: $waiter</p>
                        <p class='card-text'>Piatti: $plates_num</p>
                        <form action='claim_table.php' method='post' class='d-inline'>
                            <input type='hidden' name='table_num' value='$i'>
                            <button $disabled type='submit' class='btn btn-primary'>Prendi</button>
                        </form>
                    </div>
                </div>
                ";
                echo"</div>";
            }
        ?>
        </div>
    </div>

    <h1 class="text-center">I tuoi tavoli</h1>

    <div class="container">
        <div class='row row-cols-4'>
        <?php
            for ($i= 0; $i < sizeof($_SESSION["tables"]) ; $i++) {
                if($_SESSION["tables"][$i]->waiter == $_SESSION["user"]) {
                $title = "Tavolo " . strval($i);
                $plates_num = sizeof($_SESSION["tables"][$i]->plates);
                $waiter = $_SESSION["tables"][$i]->waiter ?? "Nessuno";
                echo"<div class='col-3 my-4'>";
                echo"
                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title'>$title</h5>
                        <p class='card-text'>Piatti: $plates_num</p>
                        <form action='manage_table.php' method='get' class='d-inline'>
                            <input type='hidden' name='table_num' value='$i'>
                            <button type='submit' class='btn btn-primary'>Gestisci</button>
                        </form>
                    </div>
                </div>
                ";
                echo"</div>";
                }
            }
        ?>
        </div>
    </div>

    


    <?php include "../scripts.php" ?>
</body>

</html>