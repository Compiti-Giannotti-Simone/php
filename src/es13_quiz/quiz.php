<?php
session_start();
include "questions.php";
if (!isset($_SESSION["current_q"])) {
    $_SESSION["current_q"] = 0;
}

?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <?php include "../head.php" ?>
</head>

<body class="">
    <div class="container py-4">
        <h1 class="text-center mb-4">Quiz</h1>

        <div id="quiz">
            <div class="card m-auto w-75">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <button id="prevBtn" class="btn btn-outline-secondary ps-2 pe-2" type="button">&lsaquo; Prev</button>                            

                        <div class="text-center flex-grow-1">
                            <h5 class="card-title">Domanda x</h5>
                            <p class="card-text mb-0">{domanda}</p>
                        </div>

                        <button id="nextBtn" class="btn btn-outline-secondary ps-2 pe-2" type="button">Next &rsaquo;</button>
                    </div>

                    <div class="d-flex justify-content-center gap-2 pt-3 border-top">
                        <button class="btn btn-outline-primary">Answer 1</button>
                        <button class="btn btn-outline-primary">Answer 2</button>
                        <button class="btn btn-outline-primary">Answer 3</button>
                        <button class="btn btn-outline-primary">Answer 4</button>
                        <button class="btn btn-outline-primary">Answer 5</button>
                    </div>
                </div>
            </div>
            <?php
            $savedAnswers = $_SESSION['answers'] ?? [];
            ?>
        </div>

        <div id="message" class="mt-3"></div>
    </div>

    <?php include "../scripts.php" ?>
</body>

</html>