<?php

$all_rows_query = "SELECT * FROM agentstrings";
$all_rows_result = $conn->query($all_rows_query);

$totalRows = $all_rows_result->num_rows;

echo "<pre> Arrives here </pre>";

$done = 0;
while ($done < $totalRows) {

	$row = $all_rows_result->fetch_array()

	set_time_limit(120);

	//-----------------------------------------------------------------------------------
	$attributes = "SELECT * FROM attributes";
	$result_att = $conn->query($attributes);
	$score = 0;
	$num_of_exposed_attributes = $row['num_of_exposed_attributes'];
	if ($result_att->num_rows > 0) {
	    $count = 0;
	    while ($rowatt = $result_att->fetch_assoc()) {
	    //while($count != 
	        if ($row[$count] == -1 || $row[$count] == "unknown" || $row[$count] === NULL) {
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

echo "<pre> Unnormalized are done </pre>";

?>
