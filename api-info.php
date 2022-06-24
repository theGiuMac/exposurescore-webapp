<?php
// Error handling and reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include statements
include "./connectionDB.php";

// Get values from the form in html to compose the SQL query
$selected_attributes = $_POST['selected_attributes'];
$info_limit = $_POST['info_limit'];
$query = "SELECT " . $selected_attributes . ", COUNT(*) as count FROM agentstrings GROUP BY " . $selected_attributes . " ORDER BY count DESC LIMIT " . $info_limit;

// Perform query after opening connection and store result in two arrays
if ($stmt = $conn->prepare(query)) {
    $stmt->execute();
    $stmt->bind_result($attribute, $attribute_count);
    $labels = array();
    $data = array();
    while ($stmt->fetch()) {
        $labels[] = $attribute;
        $data[] = $attribute_count;
    }
    $stmt->close();
}

$datasets = array('label'=>"Device Info", 'data'=>$data);
$data = array('labels'=>$labels, 'datasets'=> array($datasets));

echo json_encode($data);
?>














?>
