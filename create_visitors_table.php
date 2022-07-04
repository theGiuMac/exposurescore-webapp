<?php
    header('Content-type: text/html; charset=utf-8');

    require "./connectionDB.php";

    $sql = "CREATE TABLE `visitors` (
        `visitor` VARCHAR(64) PRIMARY KEY,
        `numVisits` INT(10) UNSIGNED NOT NULL
    ) CHARACTER SET utf8 COLLATE utf8_general_ci";

    if ($conn->query($sql) === TRUE) echo 'Table "visitors" successfully created!';
    else echo 'Error: ' . $conn->error;

    $conn->close();
?>
