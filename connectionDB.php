<?php

//$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
//$servername = $cleardb_url["host"];
//$username = $cleardb_url["user"];
//$password = $cleardb_url["pass"];
//$db = substr($cleardb_url["path"], 1);

$servername = "localhost";
$username = "giulio";
$password = "indRSA!1!";
$db = "useragents";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
    $msg1 = "Connection error";
    echo "<h1>$msg1</h1>";
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
$msg = "Connected successfully";
//echo "<h1>$msg</h1>";
