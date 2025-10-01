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
    <?php include '../head.php'; ?>
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

    <?php include '../scripts.php'; ?>
</body>

</html>