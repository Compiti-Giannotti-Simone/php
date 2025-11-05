<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <?php include "../../head.php" ?>
</head>

<body class="">
    <h1 class="text-center">Carrello</h1>

    <div class="container w-50">
        <div class="row">    
            <div class="card col-12">
                <div class="card-body">
                    <?php
                    if (count($_SESSION['cart']) == 0) {
                        echo "<p>Il carrello è vuoto.</p>";
                    } else {
                        echo "<ul class='list-group'>";
                        foreach ($_SESSION['cart'] as $item => $amount) {
                            echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
                            echo htmlspecialchars($item);
                            echo "<span class='badge bg-primary rounded-pill'>" . htmlspecialchars($amount) . "</span>";
                            echo "</li>";
                        }
                        echo "</ul>";
                    }
                    ?>
                    <a href="./empty_cart.php" class="btn btn-danger my-2">Svuota carrello</a>
                    <a href="#" class="btn btn-success my-2">Checkout</a>
                </div>
            </div>
        </div>
    </div>

    <?php include "../../scripts.php" ?>
</body>

</html>