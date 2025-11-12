<?php
include("./table.php");
session_start();
// handle add, edit and remove actions
if (isset($_POST['action']) && isset($_POST['table_num'])) {
    $action = $_POST['action'];
    $table_num = intval($_POST['table_num']);

    // basic ownership check
    if (!isset($_SESSION['tables'][$table_num]) || $_SESSION['tables'][$table_num]->waiter != ($_SESSION['user'] ?? null)) {
        $error = "Il tavolo non è tuo";
        header("Location: manage.php?error=" . urlencode($error));
        exit();
    }
    if ($action === 'add' && isset($_POST["plate_name"]) && isset($_POST['plate_amount'])) {
        $plate = $_POST["plate_name"];
        $table_num = intval($_POST["table_num"]);
        $plate_amount = intval($_POST["plate_amount"]);
        $_SESSION["tables"][$table_num]->add_plate($plate, $plate_amount);
        header("Location: manage_table.php?table_num=" . urlencode($table_num));
        exit();
    }

    if ($action === 'edit' && isset($_POST['plate_name']) && isset($_POST['new_amount'])) {
        $plate_name = $_POST['plate_name'];
        $new_amount = intval($_POST['new_amount']);
        if ($new_amount > 0) {
            $_SESSION['tables'][$table_num]->plates[$plate_name] = $new_amount;
        } else {
            // if zero or negative, remove the plate entry
            unset($_SESSION['tables'][$table_num]->plates[$plate_name]);
        }
        header("Location: manage_table.php?table_num=" . urlencode($table_num));
        exit();
    }

    if ($action === 'remove' && isset($_POST['plate_name'])) {
        $plate_name = $_POST['plate_name'];
        unset($_SESSION['tables'][$table_num]->plates[$plate_name]);
        header("Location: manage_table.php?table_num=" . urlencode($table_num));
        exit();
    }
}
if (isset($_GET["table_num"])) {
    $table_num = intval($_GET["table_num"]);
    if($_GET["table_num"] !== strval($table_num)) {
        $error = "Tavolo non esistente";
        header("Location: manage.php?error=" . urlencode($error));
        exit();
    }
    if(!isset($_SESSION["tables"][$table_num])) {
        $error = "Tavolo non esistente";
        header("Location: manage.php?error=" . urlencode($error));
        exit();
    }
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
        <p><a class="link-underline link-secondary link-underline-opacity-0" href="./manage.php"><span><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                    </svg></span> Ritorna alla selezione tavoli</a></p>
        <div class="row">
            <div class="card col-12">
                <div class="card-body">
                    <?php
                    if (count($_SESSION['tables'][$table_num]->plates) == 0) {
                        echo "<p>Il tavolo non ha piatti.</p>";
                    } else {
                        echo "<ul class='list-group'>";
                        foreach ($_SESSION['tables'][$table_num]->plates as $plate => $amount) {
                            $plateEsc = htmlspecialchars($plate, ENT_QUOTES, 'UTF-8');
                            $amountEsc = htmlspecialchars($amount, ENT_QUOTES, 'UTF-8');

                            // get unit price (0 if unknown) and compute line total
                            $unitPrice = isset($GLOBALS['menu_plates'][$plate]) ? $GLOBALS['menu_plates'][$plate] : 0.0;
                            $unitPriceFmt = number_format($unitPrice, 2);
                            $lineTotal = $unitPrice * intval($amount);
                            $lineTotalFmt = number_format($lineTotal, 2);

                            echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
                            // Plate name (truncate if too long). min-width:0 allows text-overflow to work inside flex.
                            echo "<div class='plate-name me-3 flex-grow-1' style='min-width:0;'>$plateEsc</div>";

                            // Price x qty = total (small, no-wrap)
                            echo "<div class='text-muted small me-2' style='white-space:nowrap;'>€{$unitPriceFmt} × {$amountEsc} = €{$lineTotalFmt}</div>";

                            // Right-side fixed controls (edit form, remove button, badge)
                            echo "<div class='list-controls d-flex'>";

                            // Inline edit form (number input) + save button
                            echo "<form class='d-flex align-items-center' method='post' style='gap:.5rem; margin:0; flex:0 0 auto;'>";
                            echo "<input type='hidden' name='action' value='edit'>";
                            echo "<input type='hidden' name='table_num' value='" . intval($table_num) . "'>";
                            echo "<input type='hidden' name='plate_name' value='" . $plateEsc . "'>";
                            echo "<input required min='0' type='number' name='new_amount' class='form-control form-control-sm' value='" . $amountEsc . "' style='width:4.5rem;'>";
                            echo "<button type='submit' class='btn btn-sm btn-outline-primary'>Salva</button>";
                            echo "</form>";

                            // Remove form (button)
                            echo "<form method='post' style='margin:0; flex:0 0 auto;'>";
                            echo "<input type='hidden' name='action' value='remove'>";
                            echo "<input type='hidden' name='table_num' value='" . intval($table_num) . "'>";
                            echo "<input type='hidden' name='plate_name' value='" . $plateEsc . "'>";
                            echo "<button type='submit' class='btn btn-sm btn-outline-danger'>Rimuovi</button>";
                            echo "</form>";

                            // badge with amount (kept for UX)
                            echo "<span class='badge bg-primary rounded-pill ms-2'>" . $amountEsc . "</span>";

                            echo "</div>"; // .list-controls
                            echo "</li>";
                        }

                        // total price at end of list
                        $totalPrice = $_SESSION['tables'][$table_num]->calculate_price();
                        $totalPriceFmt = number_format($totalPrice, 2);
                        echo "<li class='list-group-item d-flex justify-content-between align-items-center fw-bold'>";
                        echo "Totale";
                        echo "<span class='badge bg-success rounded-pill ms-2'>€{$totalPriceFmt}</span>";
                        echo "</li>";

                        echo "</ul>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <form class="m-auto container w-50 my-3" action="add_plate.php" method="post">
            <div class="row">
                <div class="mb-3 col-12">
                    <?php
                    echo "<input type='hidden' name='table_num' value='$table_num'>";
                    ?>
                    <button type="submit" class="col-12  m-auto btn btn-primary" name="loginButton">Aggiungi
                        piatto</button>
                </div>
            </div>
    </div>
    </form>
    </div>





    <?php include "../scripts.php" ?>
</body>

</html>