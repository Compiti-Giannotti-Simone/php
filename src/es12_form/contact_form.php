<?php
session_start();
if(isset($_SESSION["email"]) && isset($_SESSION["phone"]) && isset($_SESSION["instagram"]) && isset($_SESSION["fax"])) {
    header("Location: dashboard.php");
}
if(isset($_POST["submit"])) {
    $_SESSION["email"] = $_POST["inputEmail"];
    $_SESSION["phone"] = $_POST["inputPhone"];
    $_SESSION["instagram"] = $_POST["inputInstagram"];
    $_SESSION["fax"] = $_POST["inputFax"];
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <?php include "../head.php" ?>
</head>

<body class="">
    <h1 class="text-center">Inserisci dati di contatto</h1>

    <?php
    if(isset($_GET["error"])) {
        $error = $_GET["error"];
        echo "
        <div class='m-auto my-3 w-25 alert alert-danger' role='alert'>
            $error
        </div>
        ";
    }
    ?>

    <form class="m-auto container w-25" action="" method="post">
        <div class="row">
            <div class="mb-3 col-6">
                <label for="inputEmail" class="form-label">Email</label>
                <input required type="email" class="form-control" name="inputEmail" id="inputEmail">
            </div>
            <div class="mb-3 col-6">
                <label for="inputPhone" class="form-label">Telefono</label>
                <input required type="number" class="form-control" name="inputPhone" id="inputPhone">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label for="inputInstagram" class="form-label">Instagram</label>
                <input required type="text" class="form-control" name="inputInstagram" id="inputInstagram">
            </div>
            <div class="mb-3 col-6">
                <label for="inputFax" class="form-label">Fax</label>
                <input required type="text" class="form-control" name="inputFax" id="inputFax">
            </div>
        </div>
        <div class="row">
            <button type="submit" class="col-12 w-25 m-auto btn btn-primary" name="submit">Submit</button>
        </div>
    </form>

    <?php include "../scripts.php" ?>
</body>

</html>