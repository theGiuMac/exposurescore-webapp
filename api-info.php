<?php
// Error handling and reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include statements
include "./connectionDB.php";

// Get values from the form in html to compose the SQL query
$selected_attribute = $_POST['selected_attribute'];
echo "<h1>" . $selected_attribute . "</h1>";
$info_limit = $_POST['info_limit'];
echo "<h1>" . $info_limit . "</h1>";
$query = "SELECT " . $selected_attribute . ", COUNT(*) as count FROM agentstrings GROUP BY " . $selected_attribute . " ORDER BY count DESC LIMIT " . $info_limit;

// Perform query after opening connection and store result in two arrays
if ($stmt = $conn->prepare($query)) {
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
