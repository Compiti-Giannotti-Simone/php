<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <?php include "../head.php" ?>
</head>

<body class="">
    <h1 class="text-center">Prenotazione Ristorante</h1>
    <form class="m-auto container w-25" action="managereservation.php" method="post">
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
            <div class="mb-3 col-6">
                <label for="selectTable">Tavolo</label>
                <select required class="form-select mt-2" name="selectTable" id="selectTable">
                <option selected></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            </div>
            <div class="mb-3 col-6">
                <label for="inputTime" class="form-label">Orario</label>
                <input required type="time" class="form-control" name="inputTime" id="inputTime">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-12">
                <label for="inputNotes" class="form-label">Note Aggiuntive</label>
                <textarea class="form-control" name="inputNotes" id="inputNotes"></textarea>
            </div>
        </div>
        <div class="m-auto mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="checkMeal1" id="checkMeal1">
            <label class="form-check-label" for="checkMeal1">Antipasto</label>
        </div>
        <div class="m-auto mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="checkMeal2" id="checkMeal2">
            <label class="form-check-label" for="checkMeal2">Primo</label>
        </div>
        <div class="m-auto mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="checkMeal3" id="checkMeal3">
            <label class="form-check-label" for="checkMeal3">Secondo</label>
        </div>
        <div class="m-auto mb-3 form-check">
            <input type="radio" class="form-check-input" name="radioParking" id="radioParking1" value="0">
            <label class="form-check-label" for="radioParking1">Parcheggio custodito</label>
        </div>
        <div class="m-auto mb-3 form-check">
            <input type="radio" class="form-check-input" name="radioParking" id="radioParking2" value="1">
            <label class="form-check-label" for="radioParking2">Parcheggio non custodito</label>
        </div>
        <div class="m-auto mb-3 form-check">
            <input type="radio" class="form-check-input" name="radioParking" id="radioParking3" value="2" checked>
            <label class="form-check-label" for="radioParking3">Nessun parcheggio</label>
        </div>
        <button type="submit" class="btn btn-primary" name="submitButton">Submit</button>
    </form>

    <?php include "../scripts.php" ?>
</body>

</html>