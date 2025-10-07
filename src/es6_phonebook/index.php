<?php
// Create database if it doesn't exist
$mysqli = new mysqli("localhost", "root", "");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$mysqli->query("CREATE DATABASE IF NOT EXISTS phonebook");
$mysqli->close();

// Connect to the database
$mysqli = new mysqli("localhost", "root", "", "phonebook");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$createTable = "CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    surname VARCHAR(100) NOT NULL,
    phone VARCHAR(30) NOT NULL
)";
$mysqli->query($createTable);

if (
    isset($_POST['submitButton']) &&
    !empty($_POST['inputName']) &&
    !empty($_POST['inputSurname']) &&
    !empty($_POST['inputPhone'])
) {
    $name = $_POST['inputName'];
    $surname = $_POST['inputSurname'];
    $phone = $_POST['inputPhone'];

    $stmt = $mysqli->prepare("INSERT INTO contacts (name, surname, phone) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $surname, $phone);
    $stmt->execute();
    $stmt->close();

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
$result = $mysqli->query("SELECT name, surname, phone FROM contacts");
$phonebook = [];
while ($row = $result->fetch_assoc()) {
    $fullName = $row['name'] . ' ' . $row['surname'];
    $phonebook[$fullName] = $row['phone'];
}

// Close connection
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../head.php"; ?>
</head>

<body>
    <form action="" method="post">
        Aggiungi contatti:
        <input placeholder="Nome" type="text" name="inputName">
        <input placeholder="Cognome" type="text" name="inputSurname">
        <input placeholder="123-456-7890" type="tel" name="inputPhone">
        <input type="submit" name="submitButton">
    </form>
    <?php
    echo "<h1>Lista contatti</h1>";
    echo "<ul>";
    foreach ($phonebook as $name => $phone) {
        echo "<li>" . $name . " - " . $phone . "</li>";
    }
    echo "</ul>";


    ?>


    <?php include "../scripts.php"; ?>
</body>

</html>