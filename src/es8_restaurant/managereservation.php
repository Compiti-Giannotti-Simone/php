<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <?php include "../head.php" ?>
</head>

<body>
    <h1 class="text-center">Prenotazione</h1>
    <?php
    if (isset($_POST["submitButton"])) {
        $waiters = array("Mario", "Luigi", "Giovanni", "Marco", "Andrea");
        $rand_waiter = $waiters[rand(0, 4)];

        $name = $_POST["inputName"];
        $surname = $_POST["inputSurname"];
        $table = $_POST["selectTable"];
        $time = $_POST["inputTime"];
        $notes = $_POST["inputNotes"];
        $meal1 = isset($_POST["checkMeal1"]) ? 1 : 0; //5€
        $meal2 = isset($_POST["checkMeal2"]) ? 1 : 0; //6€
        $meal3 = isset($_POST["checkMeal3"]) ? 1 : 0; //7€
        $parking = intval($_POST["radioParking"]); //0 = +5€, 1 = +3€, 2 = +0€
        $parking_string = "";

        $price = 5 * $meal1 + 6 * $meal2 + 7 * $meal3;
        if ($meal1 && $meal2 && $meal3) {
            $price = $price * 0.95;
        } elseif ($meal1 && $meal2) {
            $price = $price * 0.9;
        }

        switch ($parking) {
            case 0:
                $parking_string = "Parcheggio custodito";
                $price += 5;
                break;
            case 1:
                $parking_string = "Parcheggio non custodito";
                $price += 3;
                break;
            case 2:
                $parking_string = "Nessun parcheggio";
                break;
        }
        if (!$meal1 && !$meal2 && !$meal3) {

        } elseif (!$meal1 && !$meal2) {

        } else {
            echo "
            <table class='table w-25 m-auto'>
                <thead>
                <tr>
                    <th scope='col'>Dati prenotzione</th>
                    <th colspan=3 scope='col'></th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope='row'>Nome</th>
                        <td colspan=3>$name</td>
                    </tr>
                    <tr>
                        <th scope='row'>Cognome</th>
                        <td colspan=3>$surname</td>
                    </tr>
                    <tr>
                        <th scope='row'>Tavolo</th>
                        <td colspan=3>$table</td>
                    </tr>
                    <tr>
                        <th scope='row'>Orario</th>
                        <td colspan=3>$time</td>
                    </tr>
                    <tr>
                        <th scope='row'>Note aggiuntive</th>
                        <td colspan=3>$notes</td>
                    </tr>
                    <tr>
                    <th scope='row'>Pasti</th>
                    <td>" . ($meal1 ? "Antipasto" : "") . "</td>
                    <td>" . ($meal2 ? "Primo" : "") . "</td>
                    <td>" . ($meal3 ? "Secondo" : "") . "</td>
                    </tr>
                    <tr>
                        <th scope='row'>Parcheggio</th>
                        <td colspan=3>$parking_string</td>
                    </tr>
                    <tr>
                        <th scope='row'>Cameriere</th>
                        <td colspan=3>$rand_waiter</td>
                    </tr>
                    <tr>
                        <th scope='row'>Prezzo</th>
                        <td colspan=3>$price €</td>
                    </tr>
                </tbody>
            </table>
            ";
        }
        $currentDate = date('l d/m/Y H:i:s');
        echo "<p class='text-center'>Prenotazione fatta il: " . $currentDate;
    }
    ?>

    <?php include "../scripts.php" ?>
</body>