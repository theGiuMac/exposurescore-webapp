<?php
include "./connectionDB.php";
$query = "SELECT parent, new_privacy_score FROM agentstrings WHERE ismobiledevice='1' AND parent IN (SELECT DISTINCT parent FROM agentstrings) GROUP BY parent ORDER BY new_privacy_score DESC LIMIT 20";
if ($stmt = $conn->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($parent, $score);
    $labels = array(); $data = array();
    while ($stmt->fetch()) {
        $labels[] = $parent;
        $data[] = $score;
    }
    $stmt->close();
}

// $datasets = array('label'=>"timer", 'data'=>$data);
$data_dict = array('labels'=>$labels, 'datasets'=> $data);

echo json_encode($data_dict)
?>
