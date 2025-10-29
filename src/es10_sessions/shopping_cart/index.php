<?php
session_start();
if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <?php include "../../head.php" ?>
</head>

<body class="">
    <h1 class="text-center">Aggiungi contatto</h1>

    <?php
    if (isset($_POST["product"])) {
        $product = $_POST["product"];
        if(!isset($_SESSION['cart'][$product])) {
            $_SESSION['cart'][$product] = 0;
        }
        $_SESSION['cart'][$product]++;
    }
    ?>

    <div class="container">
        <div class="row my-3">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cuffie Wireless</h5>
                        <p class="card-text"> </p>
                        <form action="" method="post" class="d-inline">
                            <input type="hidden" name="product" value="Cuffie Wireless">
                            <button type="submit" class="btn btn-primary">Aggiungi al carrello</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tazza Termica</h5>
                        <p class="card-text"> </p>
                        <form action="" method="post" class="d-inline">
                            <input type="hidden" name="product" value="Tazza Termica">
                            <button type="submit" class="btn btn-primary">Aggiungi al carrello</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Zaino Urban</h5>
                        <p class="card-text"> </p>
                        <form action="" method="post" class="d-inline">
                            <input type="hidden" name="product" value="Zaino Urban">
                            <button type="submit" class="btn btn-primary">Aggiungi al carrello</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lampada LED</h5>
                        <p class="card-text"> </p>
                        <form action="" method="post" class="d-inline">
                            <input type="hidden" name="product" value="Lampada LED">
                            <button type="submit" class="btn btn-primary">Aggiungi al carrello</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Mouse Gaming</h5>
                        <p class="card-text"> </p>
                        <form action="" method="post" class="d-inline">
                            <input type="hidden" name="product" value="Mouse Gaming">
                            <button type="submit" class="btn btn-primary">Aggiungi al carrello</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tastiera Meccanica</h5>
                        <p class="card-text"> </p>
                        <form action="" method="post" class="d-inline">
                            <input type="hidden" name="product" value="Tastiera Meccanica">
                            <button type="submit" class="btn btn-primary">Aggiungi al carrello</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Smartwatch Pro</h5>
                        <p class="card-text"> </p>
                        <form action="" method="post" class="d-inline">
                            <input type="hidden" name="product" value="Smartwatch Pro">
                            <button type="submit" class="btn btn-primary">Aggiungi al carrello</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cover Silicone</h5>
                        <p class="card-text"> </p>
                        <form action="" method="post" class="d-inline">
                            <input type="hidden" name="product" value="Cover Silicone">
                            <button type="submit" class="btn btn-primary">Aggiungi al carrello</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Speaker Bluetooth</h5>
                        <p class="card-text"> </p>
                        <form action="" method="post" class="d-inline">
                            <input type="hidden" name="product" value="Speaker Bluetooth">
                            <button type="submit" class="btn btn-primary">Aggiungi al carrello</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Power Bank 20000mAh</h5>
                        <p class="card-text"> </p>
                        <form action="" method="post" class="d-inline">
                            <input type="hidden" name="product" value="Power Bank 20000mAh">
                            <button type="submit" class="btn btn-primary">Aggiungi al carrello</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Router Mesh</h5>
                        <p class="card-text"> </p>
                        <form action="" method="post" class="d-inline">
                            <input type="hidden" name="product" value="Router Mesh">
                            <button type="submit" class="btn btn-primary">Aggiungi al carrello</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Action Camera 4K</h5>
                        <p class="card-text"> </p>
                        <form action="" method="post" class="d-inline">
                            <input type="hidden" name="product" value="Action Camera 4K">
                            <button type="submit" class="btn btn-primary">Aggiungi al carrello</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Occhiali da Sole</h5>
                        <p class="card-text"> </p>
                        <form action="" method="post" class="d-inline">
                            <input type="hidden" name="product" value="Occhiali da Sole">
                            <button type="submit" class="btn btn-primary">Aggiungi al carrello</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Portafoglio Slim</h5>
                        <p class="card-text"> </p>
                        <form action="" method="post" class="d-inline">
                            <input type="hidden" name="product" value="Portafoglio Slim">
                            <button type="submit" class="btn btn-primary">Aggiungi al carrello</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Borraccia Isolante</h5>
                        <p class="card-text"> </p>
                        <form action="" method="post" class="d-inline">
                            <input type="hidden" name="product" value="Borraccia Isolante">
                            <button type="submit" class="btn btn-primary">Aggiungi al carrello</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Set Posate Travel</h5>
                        <p class="card-text"> </p>
                        <form action="" method="post" class="d-inline">
                            <input type="hidden" name="product" value="Set Posate Travel">
                            <button type="submit" class="btn btn-primary">Aggiungi al carrello</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center m-auto">
        <a href="./cart.php" class="btn btn-success">Visualizza carrello</a>
    </div>

    <?php include "../../scripts.php" ?>
</body>

</html>