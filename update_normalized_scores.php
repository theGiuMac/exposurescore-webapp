<?php

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

	// Get each browser's row
	$row = $all_rows_result->fetch_array();

	// Get each browser's unnormalized score
	$unnormalized_score = $row['unnormalized_score'];

	// Normalize the score
	$normalized_score = normalize($min, $max, $unnormalized_score);

	// Update the normalized score (`new_privacy_score`)
	update_normalized($conn, $normalized_score, $row['browserid']);
}



