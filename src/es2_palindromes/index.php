<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../head.php'; ?>
</head>

<body>
    <form action="" method="get">
        Inserisci stringa:
        <input type="text" name="inputString">
        <input type="submit" name="submitButton">
    </form>
    <?php
    if (isset($_GET['submitButton']) && $_GET['inputString'] !== "") { //check if form was submitted
        $input = $_GET['inputString']; //get input text
        if ($input == strrev($input)) {
            echo "<p>La stringa è un palindromo</p>";
        } elseif ($input == '') {
            return;
        } else {
            echo '<p>La stringa non è un palindromo</p>';
        }
        $no_vowels = preg_replace('#[aeiouAEIOU\s]+#i', '', $input);
        echo '<p>La stinga senza vocali è: ' . $no_vowels . '</p>';
    }
    ?>

    <?php include '../scripts.php'; ?>
</body>

</html>