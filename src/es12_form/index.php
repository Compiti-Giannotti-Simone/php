<?php
session_start();
if(isset($_POST["submit"])) {
    if(sizeof($_POST) == 6) {
        $_SESSION["name"] = $_POST["inputName"];
        $_SESSION["surname"] = $_POST["inputSurname"];
        $_SESSION["birthDate"] = $_POST["inputBirthDate"];
        $_SESSION["birthLocation"] = $_POST["inputBirthLocation"];
        $_SESSION["address"] = $_POST["inputAddress"];
    }
}
if(isset($_SESSION["name"]) && isset($_SESSION["surname"]) && isset($_SESSION["birthDate"]) && isset($_SESSION["birthLocation"]) && isset($_SESSION["address"])) {
    header("Location: contact_form.php");
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <?php include "../head.php" ?>
</head>

<body class="">
    <h1 class="text-center">Inserisci dati anagrafici</h1>

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
                <label for="inputName" class="form-label">Nome</label>
                <input required type="text" class="form-control" name="inputName" id="inputName">
            </div>
            <div class="mb-3 col-6">
                <label for="inputSurname" class="form-label">Cognome</label>
                <input required type="test" class="form-control" name="inputSurname" id="inputSurname">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label for="inputBirthDate" class="form-label">Data di nascita</label>
                <input required type="date" class="form-control" name="inputBirthDate" id="inputBirthDate">
            </div>
            <div class="mb-3 col-6">
                <label for="inputBirthLocation" class="form-label">Luogo di nascita</label>
                <input required type="text" class="form-control" name="inputBirthLocation" id="inputBirthLocation">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-12">
                <label for="inputAddress" class="form-label">Indirizzo di residenza</label>
                <input required type="text" class="form-control" name="inputAddress" id="inputAddress">
            </div>
        </div>
        <div class="row">
            <button type="submit" class="col-12 w-25 m-auto btn btn-primary" name="submit">Submit</button>
        </div>
    </form>

    <?php include "../scripts.php" ?>
</body>

</html>