<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <?php include "../head.php" ?>
</head>

<body class="">
    <h1 class="text-center">Aggiungi contatto</h1>

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

    <form class="m-auto container w-25" action="checkContact.php" method="post">
        <div class="row">
            <div class="mb-3 col-6">
                <label for="inputName" class="form-label">Nome</label>
                <input required type="text" class="form-control" name="inputName" id="inputName">
            </div>
            <div class="mb-3 col-6">
                <label for="inputSurname" class="form-label">Cognome</label>
                <input required type="text" class="form-control" name="inputSurname" id="inputSurname">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-12">
                <label for="inputEmail" class="form-label">Email</label>
                <input required type="mail" class="form-control" name="inputEmail" id="inputEmail">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-12">
                <label for="inputMessage" class="form-label">Messaggio</label>
                <textarea class="form-control" name="inputMessage" id="inputMessage"></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" name="submitButton">Submit</button>
    </form>

    <?php include "../scripts.php" ?>
</body>

</html>