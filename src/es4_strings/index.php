<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../head.php'; ?>
</head>

<body>
    <?php
    $str = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce rhoncus auctor justo, ut fermentum tellus consectetur id. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in lectus vel enim maximus ultrices id a eros. Nullam tempus accumsan dictum. In faucibus consectetur elementum. Curabitur turpis felis, efficitur ut facilisis in, tincidunt ut nibh. Duis non dictum lectus, eget hendrerit nunc. Integer ornare ultrices nulla, ac scelerisque nisl egestas at. Aliquam erat volutpat. Fusce vel metus odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;";
    echo "<p style='font-size: " . rand(16, 40) . "px; color: green;'>" . $str . "</p>";
    echo "<p style='font-size: " . rand(16, 40) . "px; color: blue;'>" . strtoupper($str) . "</p>";
    echo "<h1 style='color: red;'>" . strlen($str) . "</h1>";
    echo "<h1 style='color: yellow;'>" . str_word_count($str) . "</h1>";
    ?>

    <?php include '../scripts.php'; ?>
</body>

</html>