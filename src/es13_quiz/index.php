<?php
session_start();
include "questions.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['q'], $_POST['a'])) {
    $q = intval($_POST['q']);
    $a = intval($_POST['a']);

    if (isset($questions[$q]) && isset($answers[$q][$a])) {
        if (!isset($_SESSION['answers']) || !is_array($_SESSION['answers'])) {
            $_SESSION['answers'] = [];
        }
        $_SESSION['answers'][$q] = $a;
    }

    // PRG to avoid resubmission
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <?php include "../head.php" ?>
    <style>
        .answers { margin-bottom: 1.25rem; }
        .answer-btn { min-width: 6rem; margin-right: .5rem; margin-bottom:.5rem; display:inline-block; }
        .answer-form { display:inline-block; margin-right:.25rem; }
    </style>
</head>

<body class="">
    <div class="container py-4">
        <h1 class="text-center mb-4">Quiz</h1>

        <div id="quiz">
            <?php
            $savedAnswers = $_SESSION['answers'] ?? [];

            // render questions and buttons as small forms so clicking submits to PHP
            foreach ($questions as $i => $q) {
                echo "<div class='card mb-3'><div class='card-body'>";
                echo "<h5 class='card-title'>Q" . ($i + 1) . ". " . htmlspecialchars($q) . "</h5>";
                echo "<div class='answers' data-q='$i'>";

                $saved = array_key_exists($i, $savedAnswers) ? $savedAnswers[$i] : null;
                foreach ($answers[$i] as $ai => $opt) {
                    // when saved: disable all buttons for that question and style selected one
                    if ($saved !== null) {
                        $cls = ($ai == $saved) ? 'btn btn-success answer-btn' : 'btn btn-secondary answer-btn';
                        echo "<button class='$cls' disabled>" . htmlspecialchars($opt) . "</button>";
                    } else {
                        // not saved yet: wrap each button in a tiny form to POST q/a
                        echo "<form class='answer-form' method='post' action='index.php'>";
                        echo "<input type='hidden' name='q' value='$i'>";
                        echo "<input type='hidden' name='a' value='$ai'>";
                        echo "<button type='submit' class='btn btn-outline-primary answer-btn'>" . htmlspecialchars($opt) . "</button>";
                        echo "</form>";
                    }
                }

                echo "</div>";
                echo "</div></div>";
            }
            ?>
        </div>

        <form action="submit.php" method="post">
            <div class="d-flex justify-content-center">
                <a href="./clear.php" class="btn btn-danger mx-3">Reset answers</a>
                <button type="submit" class="btn btn-success">Submit Quiz</button>
            </div>
        </form>

        <div id="message" class="mt-3"></div>
    </div>

    <?php include "../scripts.php" ?>
</body>

</html>