<?php
include("./table.php");
session_start();
if(isset($_POST["table_num"])) {
    $table_num = intval($_POST["table_num"]);
    if($_SESSION["tables"][$table_num]->waiter == "") {
        $_SESSION["tables"][$table_num]->set_waiter($_SESSION["user"]);
        header("Location: manage.php");
        exit();
    }
    else {
        $error = "Tavolo già gestito da un altro cameriere";
    }
}
else {
    $error = "Tavolo non valido";
}
header("Location: manage.php?error=" . urlencode($error));
exit();
?>