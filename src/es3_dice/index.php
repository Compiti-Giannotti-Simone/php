<?php
function draw_die($number)
{
    $pips = [
        1 => [5],
        2 => [1, 9],
        3 => [1, 5, 9],
        4 => [1, 3, 7, 9],
        5 => [1, 3, 5, 7, 9],
        6 => [1, 3, 4, 6, 7, 9]
    ];
    $html = '<div class="die">';
    for ($i = 1; $i <= 9; $i++) {
        $html .= '<span class="pip' . (in_array($i, $pips[$number]) ? ' on' : '') . '"></span>';
    }
    $html .= '</div>';
    return $html;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>

<body class="bg-dark text-white quicksand-400">
    <h1 class="text-center mt-3">Roll the dice</h1>
    <form class="text-center mt-3" action="" method="get">
        <button type="submit" class="btn btn-primary">Roll</button>
    </form>

    <?php
    $die1 = rand(1, 6);
    $die2 = rand(1, 6);
    echo '<div class="text-center mt-4 d-flex justify-content-center gap-4">';
    echo draw_die($die1);
    echo draw_die($die2);
    echo '</div>';
    echo '<h3 class="text-center text-success mt-3">result: ' . ($die1 + $die2) . '</h3>';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>