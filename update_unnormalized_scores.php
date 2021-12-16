<?php

$sqlAgent = "SELECT COUNT(*) FROM agentstrings";
$totalRows_result = $conn->query($sqlAgent);
$totalRows = $totalRows_result->fetch_array()[0];

$all_rows_query = "SELECT * FROM agentstrings";
$all_rows_result = $conn->query($all_rows_query);

$done = 0;
while ($row = $all_rows_result->fetch_array(MYSQLI_BOTH)) {

	set_time_limit(120);

	if ($done == $totalRows / 4) {
		echo "<pre> 1/4 is updated ... </pre>";
	} else if ($done == $totalRows / 2) {
		echo "<pre> 2/4 is updated ... </pre>";
	} else if ($done == ($totalRows / 4 * 3)) {
		echo "<pre> 3/4 is updated ... </pre>";
	}

	//-----------------------------------------------------------------------------------
	$attributes = "SELECT * FROM attributes";
	$result_att = $conn->query($attributes);
	$score = 0;
	$num_of_exposed_attributes = $row['num_of_exposed_attributes'];
	if ($result_att->num_rows > 0) {
	    $count = 0;
	    while ($rowatt = $result_att->fetch_assoc()) {
	    //while($count != 
	        if ($row[$count] == -1 || $row[$count] == "unknown" || $row[$count] === Null) {
	            $score += 0;
	        } else {
	            $score += (($rowatt["sofj"] + $rowatt["sj"]) * (($rowatt["rjovern"] * ($num_of_exposed_attributes / 47)) + $rowatt["vj"]));
	        }
	        $count++;
	    }
	}

	$score = round($score, 3);

	$update_unnormalized_query = "UPDATE agentstrings SET unnormalized_score = '" . $score . "' WHERE browserid= '" . $row['browserid'] . "'";
	$update_result = $conn->query($update_unnormalized_query);

	$done++;
}

echo "<pre> Update complete! </pre>";

?>