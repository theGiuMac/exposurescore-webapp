<?php
    require "./connectionDB.php";
    $sql = "SELECT visits FROM `visitors` WHERE id = 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $visits = $row["visits"];
        }
    } else {
        echo "<h4>No results</h4>";
    }

    $conn->close();
?>
