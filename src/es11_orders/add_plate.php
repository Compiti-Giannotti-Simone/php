<?php
include("./table.php");
session_start();
// simple predefined menu list

if (isset($_POST['table_num'])) {
    $table_num = intval($_POST['table_num']);

    // basic ownership check
    if (!isset($_SESSION['tables'][$table_num]) || $_SESSION['tables'][$table_num]->waiter != ($_SESSION['user'] ?? null)) {
        $error = "Il tavolo non è tuo";
        header("Location: manage.php?error=" . urlencode($error));
        exit();
    }
}
else {
    header("Location: manage.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <?php include "../head.php" ?>
    <style>
        /* keep plate name on a single line and truncate when too long */
        .plate-name {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* right-side controls: do not grow, keep fixed next to badge */
        .list-controls {
            gap: .5rem;
            align-items: center;
            flex: 0 0 auto;
        }
    </style>
</head>

<body class="">
    <h1 class="text-center">Seleziona il piatto da aggiungere</h1>
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
        <p>
            <?php
            echo "<a class='link-underline link-secondary link-underline-opacity-0' href='./manage_table.php?table_num=" . urlencode($table_num) . "'>";
            ?>
            <span><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                    </svg></span> Ritorna al tavolo</a></p>
        <div class="row">
            <div class="card col-12">
                <div class="card-body">
                    <?php
                        echo "<ul class='list-group'>";
                        foreach ($menu_plates as $plate => $price) {
                            $plateEsc = htmlspecialchars($plate, ENT_QUOTES, 'UTF-8');
                            $priceEsc = htmlspecialchars(number_format($price, 2) . " €", ENT_QUOTES, 'UTF-8');
                            echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
                            // Plate name (truncate if too long). min-width:0 allows text-overflow to work inside flex.
                            echo "<div class='plate-name me-3 flex-grow-1' style='min-width:0;'>$plateEsc - $priceEsc</div>";

                            // Right-side fixed controls (edit form, remove button, badge)
                            echo "<div class='list-controls d-flex'>";

                            // Inline edit form (number input) + save button
                            echo "<form action='manage_table.php' class='d-flex align-items-center' method='post' style='gap:.5rem; margin:0; flex:0 0 auto;'>";
                            echo "<input type='hidden' name='action' value='add'>";
                            echo "<input type='hidden' name='table_num' value='" . intval($table_num) . "'>";
                            echo "<input type='hidden' name='plate_name' value='" . $plateEsc . "'>";
                            echo "<input type='hidden' name='plate_price' value='" . $price . "'>";
                            echo "<input required min='0' type='number' name='plate_amount' class='form-control form-control-sm' value='1' style='width:4.5rem;'>";
                            echo "<button type='submit' class='btn btn-sm btn-outline-primary'>Aggiungi</button>";
                            echo "</form>";

                            echo "</div>"; // .list-controls
                            echo "</li>";
                        }
                        echo "</ul>";
                    ?>
                </div>
            </div>
        </div>
    </div>





    <?php include "../scripts.php" ?>
</body>

</html>