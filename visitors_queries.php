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
$dt = time();
$nrvst = 0;

$sqliu = "INSERT INTO `visitors` (`visitor`, `numVisits`) VALUES ('$visitor', $dt) ON DUPLICATE KEY UPDATE `dt`=$dt";
$sqlsel = "SELECT * FROM `visitors`";

if (!$conn->query($sqliu)) echo 'Error: ' . $conn->error;
    $result = $conn->query($sqlsel);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if (preg_match($rgxvst, $row['visitor'])) $nrvst++;
    }
}

$conn->close();

$reout = '<div id="visitors"><h4>Visitors: ' . $nrvst . '</h4></div>';

if (isset($_GET['visitors']) && $_GET['visitors'] == 'showon') $reout = "document.write('$reout');";
