<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../head.php"?>
</head>
<body>
    
    <form method="get">
        <input placeholder="Name" type="text" name="inputName">
        <input placeholder="Surname" type="text" name="inputSurname">
        <input placeholder="example@email.com" type="email" name="inputEmail">
        <input type="submit" name="submitButton">
    </form>

    <?php
    if (isset($_GET['submitButton']) && $_GET['inputName'] !== "" && $_GET['inputSurname'] !== "" && $_GET['inputEmail'] !== "") {
        $name = $_GET["inputName"];
        $surname = $_GET["inputSurname"];
        $email = $_GET["inputEmail"];
        
        echo "<p>Name: ". $name ."</p>";
        echo "<p>Surname: ". $surname . "</p>";
        echo "<p>Email: ". $email . "</p>";
    }
    ?>

    <?php include "../scripts.php"?>
</body>
</html>



