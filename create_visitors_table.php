<?php
    header('Content-type: text/html; charset=utf-8');

    require "./connectionDB.php";

    $sql = "CREATE TABLE `visitors` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `visits` INT(15) UNSIGNED NOT NULL DEFAULT 0
    ) CHARACTER SET utf8 COLLATE utf8_general_ci";

    if ($conn->query($sql) === TRUE) echo 'Table "visitors" successfully created!';
    else echo 'Error: ' . $conn->error;

    $conn->close();
?>
