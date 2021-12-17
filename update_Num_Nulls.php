<?php

echo "<pre> OK </pre>";

$rows_query = "SELECT * FROM agentstrings";
$rows = $conn->query($rows_query);

$size = $rows->num_rows;
echo "<pre> Size: '" . $size . "'</pre>";

$num_of_nulls = array_fill(0, 47, 0);

// Iterate over each database entry, i.e. over each browser
$num_rows = 0;

while ($num_rows < $size) {

	set_time_limit(60);

	$row = $rows->fetch_array();

	$row_els = sizeof($row);
	//echo "<pre> '" . $row_els . "'</pre>";
	
	if (($row['renderingengine_name'] == "unknown") || ($row['renderingengine_name'] === NULL)) {
		$num_of_nulls[0]++;
	}

	if (($row['renderingengine_version'] == "unknown" ) || ($row['renderingengine_version'] === NULL)) {
		$num_of_nulls[1]++;
	}	

	if (($row['renderingengine_description'] == "unknown") || ($row['renderingengine_description'] === NULL)) {
		$num_of_nulls[2]++;
	}

	if (($row['renderingengine_maker'] == "unknown") || ($row['renderingengine_maker'] === NULL)) {
		$num_of_nulls[3]++;
	}

	if (($row['comments'] == 0) || ($row['comments'] === NULL)) {
		$num_of_nulls[4]++;
	}

	if (($row['browser'] == "unknown") || ($row['browser'] === NULL)) {
		$num_of_nulls[5]++;
	}

	if (($row['browser_type'] == "unknown") || ($row['browser_type'] === NULL)) {
		$num_of_nulls[6]++;
	}

	if (($row['browser_maker'] == "unknown") || ($row['browser_maker'] === NULL)) {
		$num_of_nulls[7]++;
	}

	if (($row['version'] == "unknown") || ($row['version'] === NULL)) {
		$num_of_nulls[8]++;
	}

	if (($row['majorver'] == "unknown") || ($row['majorver'] === NULL)) {
		$num_of_nulls[9]++;
	}

	if (($row['minorver'] == "unknown") || ($row['minorver'] === NULL)) {
		$num_of_nulls[10]++;
	}

	if (($row['parent'] == "unknown") || ($row['parent'] === NULL)) {
		$num_of_nulls[11]++;
	}

	if (($row['browser_bits'] == "unknown") || ($row['browser_bits'] === NULL)) {
		$num_of_nulls[12]++;
	}

	if (($row['frames'] == -1) || ($row['frames'] === NULL)) {
		$num_of_nulls[13]++;
	}

	if (($row['iframes'] == -1) || ($row['iframes'] === NULL)) {
		$num_of_nulls[14]++;
	}

	if (($row['tabless'] == -1) || ($row['tabless'] === NULL)) {
		$num_of_nulls[15]++;
	}

	if (($row['cookies'] == -1) || ($row['cookies'] === NULL)) {
		$num_of_nulls[16]++;
	}

	if (($row['javascript'] == -1) || ($row['javascript'] === NULL)) {
		$num_of_nulls[17]++;
	}

	if (($row['cssversion'] == -1) || ($row['cssversion'] === NULL)) {
		$num_of_nulls[18]++;
	}

	if (($row['browser_modus'] == "unknown") || ($row['browser_modus'] === NULL)) {
		$num_of_nulls[19]++;
	}

	if (($row['alpha'] == -1) || ($row['alpha'] === NULL)) {
		$num_of_nulls[20]++;
	}

	if (($row['beta'] == -1) || ($row['beta'] === NULL)) {
		$num_of_nulls[21]++;
	}

	if (($row['win16'] == -1) || ($row['win16'] === NULL)) {
		$num_of_nulls[22]++;
	}

	if (($row['win32'] == -1) || ($row['win32'] === NULL)) {
		$num_of_nulls[23]++;
	}

	if (($row['win64'] == -1) || ($row['win64'] === NULL)) {
		$num_of_nulls[24]++;
	}

	// End of first page of attributes


	if (($row['backgroundsounds'] == -1) || ($row['backgroundsounds'] === NULL)) {
		$num_of_nulls[25]++;
	}

	if (($row['vbscript'] == -1) || ($row['vbscript'] === NULL)) {
		$num_of_nulls[26]++;
	}

	if (($row['activexcontrols'] == -1) || ($row['activexcontrols'] === NULL)) {
		$num_of_nulls[27]++;
	}

	if (($row['issyndicationreader'] == -1) || ($row['issyndicationreader'] === NULL)) {
		$num_of_nulls[28]++;
	}

	if (($row['crawler'] == -1) || ($row['crawler'] === NULL)) {
		$num_of_nulls[29]++;
	}

	if (($row['isfake'] == -1) || ($row['isfake'] === NULL)) {
		$num_of_nulls[30]++;
	}

	if (($row['isanonymized'] == -1) || ($row['isanonymized'] === NULL)) {
		$num_of_nulls[31]++;
	}

	if (($row['ismodified'] == -1) || ($row['ismodified'] === NULL)) {
		$num_of_nulls[32]++;
	}

	if (($row['javaapplets'] == -1) || ($row['javaapplets'] === NULL)) {
		$num_of_nulls[33]++;
	}

	if (($row['platform'] == "unknown") || ($row['platform'] === NULL)) {
		$num_of_nulls[34]++;
	}

	if (($row['platform_description'] == "unknown") || ($row['platform_description'] === NULL)) {
		$num_of_nulls[35]++;
	}

	if (($row['platform_bits'] == -1) || ($row['platform_bits'] === NULL)) {
		$num_of_nulls[36]++;
	}

	if (($row['platform_version'] == "unknown") || ($row['platform_version'] === NULL)) {
		$num_of_nulls[37]++;
	}

	if (($row['platform_maker'] == "unknown") || ($row['platform_maker'] === NULL)) {
		$num_of_nulls[38]++;
	}

	if (($row['device_name'] == "unknown") || ($row['device_name'] === NULL)) {
		$num_of_nulls[39]++;
	}

	if (($row['device_code_name'] == "unknown") || ($row['device_code_name'] === NULL)) {
		$num_of_nulls[40]++;
	}

	if (($row['device_maker'] == "unknown") || ($row['device_maker'] === NULL)) {
		$num_of_nulls[41]++;
	}

	if (($row['device_brand_name'] == "unknown") || ($row['device_brand_name'] === NULL)) {
		$num_of_nulls[42]++;
	}

	if (($row['ismobiledevice'] == -1) || ($row['ismobiledevice'] === NULL)) {
		$num_of_nulls[43]++;
	}

	if (($row['device_type'] == "unknown") || ($row['device_type'] === NULL)) {
		$num_of_nulls[44]++;
	}

	if (($row['device_pointing_method'] == "unknown") || ($row['device_pointing_method'] === NULL)) {
		$num_of_nulls[45]++;
	}

	if (($row['istablet'] == -1) || ($row['istablet'] === NULL)) {
		$num_of_nulls[46]++;
	}

	$num_rows++;
}

echo "<pre> After nulls loop </pre>";

for ($idx=0; $idx < 47; $idx++) {

	// update num_nulls
	$update_nulls_query = "UPDATE attributes SET num_nulls = '" . $num_of_nulls[$idx] . "' WHERE attributeid = '" . ($idx + 1) . "'";
	$nulls_result = $conn->query($update_nulls_query);

	// calculate and update SofJ :
	$diff = $num_rows - $num_of_nulls[$idx];
	$sofj = (($num_rows - $diff) / $num_rows);
	$update_sofj_query = "UPDATE attributes SET sofj = '" . $sofj . "' WHERE attributeid = '" . ($idx + 1) . "'";
	$sofj_result = $conn->query($update_sofj_query);

	// calculate RoverJ (needed for the next calculation) :
	$roverj = $diff;

	// calculate and update RoverJmodN :
	$rjovern = ($roverj / $num_rows);
	$update_rjovern_query = "UPDATE attributes SET rjovern = '" . $rjovern . "' WHERE attributeid = '" . ($idx + 1) . "'";
	$rjovern_result = $conn->query($update_rjovern_query);
}

//echo "<pre> After other symbols loop </pre>";

// ----------------------- UNNORMALIZED SECTION ------------------------

echo "<pre> Arrives here </pre>";

$done = 0;
while ($done < $size) {

	$row = $all_rows_result->fetch_array()

	set_time_limit(60);

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

// ------------------- NORMALIZED SECTION ---------------------

// Normalize over the [1-10] range
function normalize($min, $max, $score) {
	$normalized = ($score - $min) / ($max - $min) * 10;
	return round($normalized, 2);
}

// Query that updates the normalize score of a particular browser
function update_normalized($conn, $score, $browserid) {
	$score_update_query = "UPDATE agentstrings SET new_privacy_score = '" . $score . "' WHERE browserid = '" . $browserid . "'";
	$score_update_result = $conn->query($score_update_query);

	$time_privacy_score = date("Y-m-d h:m:s");
	$time_update_query = "UPDATE agentstrings SET time_privacy_score = '" . $time_privacy_score . "' WHERE browserid = '" . $browserid . "'";
	$time_update_result = $conn->query($time_update_query);
}

// Find minimum and maximum for normalizing the relative scores
$min_max_query = "SELECT MAX(unnormalized_score) AS max, MIN(unnormalized_score) AS min FROM agentstrings";
$min_max_result = $conn->query($min_max_query);

$min_max = $min_max_result->fetch_array();
$min = $min_max['min'];
$max = $min_max['max'];

$all_rows_query = "SELECT * FROM agentstrings";
$all_rows_result = $conn->query($all_rows_query);

$totalRows = $all_rows_result->num_rows;

// ------------- Main update loop -----------------

// For each broswer, normalize and update its relative score
for ($count=0; $count < $totalRows; $count++) {

	// Allow 1 minute for each computation
	set_time_limit(60);

	// Get each browser's row
	$row = $all_rows_result->fetch_array();

	// Get each browser's unnormalized score
	$unnormalized_score = $row['unnormalized_score'];

	// Normalize the score
	$normalized_score = normalize($min, $max, $unnormalized_score);

	// Update the normalized score (`new_privacy_score`)
	update_normalized($conn, $normalized_score, $row['browserid']);
}
