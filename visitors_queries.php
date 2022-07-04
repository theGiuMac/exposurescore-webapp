<?php
function getRealIpAddr() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

if (!isset($_SESSION)) session_start();

require "./connectionDB.php";

$visitor = getRealIpAddr();

$sqlgetnrvst = "SELECT numVisits FROM `visitors` WHERE visitor = " . $visitor;
$nrvst = $conn->query($sqlgetnrvst);
if ($nrvst == False) $nrvst = 1;

$sqliu = "INSERT INTO `visitors` (`visitor`, `numVisits`) VALUES ('$visitor', $nrvst) ON DUPLICATE KEY UPDATE `numVisits`=$nrvst + 1";
$sqlsel = "SELECT * FROM `visitors`";

if (!$conn->query($sqliu)) echo 'Error: ' . $conn->error;
$result = $conn->query($sqlsel);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if (preg_match($rgxvst, $row['visitor'])) $nrvst++;
    }
} else {
    echo "<h4>No visitors!</h4>";
}

$conn->close();

$reout = '<h4>Visitors: ' . $nrvst . '</h4>';
echo $reout;
