<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../head.php'; ?>
</head>

<body>
    <ul>

        <?php
        function is_prime($n)
        {
            if ($n <= 1) {
                return false;
            }

            for ($x = 2; $x < $n; $x++) {
                if ($n % $x == 0) {
                    return false;
                }
            }

            return true;
        }

        $num = 0;
        for ($j = 0; $j < 100; ) {
            if (is_prime($num)) {
                $j++;
                echo "<li> " . $num . "</li>";
            }
            $num++;
        }
        ?>
    </ul>

    <?php include '../scripts.php'; ?>
</body>

</html>