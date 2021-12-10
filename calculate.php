<?php
$final_score = 0;

// ----------

// ----------

// -----------------------------------------------------------------------------------

function bestCase(&$flag, $colvals, &$final_score) {
    $checkRow = "SELECT * FROM agentstrings 
    WHERE parent like'" . $colvals[1] . "' AND browser_bits=" . $colvals[2] . " AND platform LIKE '" . $colvals[3] .
        "' AND platform_description LIKE '" . $colvals[4] . "' AND platform_bits =" . $colvals[5] .
        " AND platform_maker LIKE '" . $colvals[6] . "' AND new_privacy_score != 0 AND checkCVSS != 0";
    $resultCheckRow = $conn->query($checkRow); // best case

    if ($resultCheckRow->num_rows > 0) { // this row is founded in the database
        if ($rowCheck = $resultCheckRow->fetch_assoc()) { // best case
	        echo "<h3>Found a match in the database</h3>";
            $final_score = ($rowCheck['new_privacy_score'] + $rowCheck['cvss_score']);
            echo "<h3>Relative Score For Your Browser: " . $rowCheck['new_privacy_score'] . "</h3>";
            echo "<h3>CVSS Score For Your Browser: " . $rowCheck['cvss_score'] . "</h3>";
            echo "<h3>" . "Final Score For Your Browser: <span id='scoreColor'>" . $final_score . "</span></h3>";
            echo "<h5>Last Update In: " . $rowCheck['time_privacy_score'] . "</h5>";
            $new_date = date("Y-m-d h:m:s");
            $sqlLastSeen = "UPDATE agentstrings SET last_seen ='" . $new_date . "' WHERE browserid =" . $rowCheck['browserid'];
            $conn->query($sqlLastSeen);
            $new_times_seen = $rowCheck['times_seen'] + 1;
            $sqlTimesSeen = "UPDATE agentstrings SET times_seen ='" . $new_times_seen ."' WHERE browserid =" . $rowCheck['browserid'];
            $conn->query($sqlTimesSeen);
            $flag = false;
    }
    // Best case does not apply
    $flag = true;
}

function cvssIntermediateCase(&$flag, $colvals, &$final_score) {
    $checkRow2 = "SELECT * FROM agentstrings 
    WHERE parent like'" . $colvals[1] . "' AND browser_bits=" . $colvals[2] . " AND platform LIKE '" . $colvals[3] .
        "' AND platform_description LIKE '" . $colvals[4] . "' AND platform_bits =" . $colvals[5] .
        " AND platform_maker LIKE '" . $colvals[6] . "' AND new_privacy_score != 0 AND checkCVSS = 0";
    $resultCheckRow2 = $conn->query($checkRow2); // intermediate case 1

    if ($resultCheckRow2->num_rows > 0) { // intermediate case 1 cvss_score is zero
        require "cvss_intermediate_case.php";
        $resultCheckRow = $conn->query($checkRow);
        if ($resultCheckRow->num_rows > 0) {
            if ($rowCheck = $resultCheckRow->fetch_assoc()) {
	            echo "<h3>CVSS score is zero</h3>";
                $final_score = ($rowCheck['new_privacy_score'] + $rowCheck['cvss_score']);
                echo "<h3>Relative Score For Your Browser: " . $rowCheck['new_privacy_score'] . "</h3>";
                echo "<h3>CVSS Score For Your Browser: " . $rowCheck['cvss_score'] . "</h3>";
                echo "<h3>" . "Final Score For Your Browser: <span id='scoreColor'>" . $final_score . "</span></h3>";
                echo "<h3>" . $rowCheck['time_privacy_score'] . "</h3>";
                $new_date = date("Y-m-d h:m:s");
                $sqlLastSeen = "UPDATE agentstrings SET last_seen ='" . $new_date . "' WHERE browserid =" . $rowCheck['browserid'];
                $conn->query($sqlLastSeen);
                $flag = false;
            }
        }
    }
    // CVSS intermediate case does not apply
    $flag = true;
}


function privacyIntermediateCase(&$flag, $colvals, &$final_score) {
    $checkRow3 = "SELECT * FROM agentstrings 
    WHERE parent like'" . $colvals[1] . "' AND browser_bits=" . $colvals[2] . " AND platform LIKE '" . $colvals[3] .
        "' AND platform_description LIKE '" . $colvals[4] . "' AND platform_bits =" . $colvals[5] .
        " AND platform_maker LIKE '" . $colvals[6] . "' AND new_privacy_score = 0 AND checkCVSS != 0";
    $resultCheckRow3 = $conn->query($checkRow3); // intermediate case 2


    if ($resultCheckRow3->num_rows > 0) { // intermediate case 2 new_privacy_score is zero
        echo "<h3>New privacy score is zero</h3>";
        require "privacy_score_intermediate_case.php";
        $flag = false;
    }
    // Privacy intermediate case does not apply
    $flag = true;
}

$flag = true;
bestCase($flag, $colvals, $final_score);
if ($flag) {
    cvssIntermediateCase($flag, $colvals, $final_score);
}
if ($flag) {
    privacyIntermediateCase($flag, $colvals, $final_score);
}
if ($flag) {
    echo "<h3>No match in the database and CVSS score is zero</h3>";
    require "worse_case.php";
}