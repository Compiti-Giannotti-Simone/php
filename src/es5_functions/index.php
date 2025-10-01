<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../head.php'; ?>
</head>

<body class="text-center">
    <?php
    $grades = [7, 5, 6, 8, 9];
    include("functions.php");
    echo "<h1>Voti:</h1>";
    echo "<p>" . implode(", ", $grades) . "</p>";
    echo "<p>Media: " . mean($grades) . "</p>";
    echo "<p>Risultato: " . printResult(mean($grades)) . "</p>";
    ?>

    <?php include '../scripts.php'; ?>
</body>

</html>