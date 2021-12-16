<?php
$stmt1 = "SELECT  DISTINCT `parent`, `browser_bits`, `platform`, `platform_description`, `platform_bits`, `platform_maker`, 
`javaapplets`, `device_name`, `device_maker`, `device_code_name`, `device_brand_name`, `renderingengine_name`, 
`renderingengine_version`, `renderingengine_description`, `renderingengine_maker`, `comments`, `browser`, `browser_type`, 
`browser_maker`, `version`, `majorver`, `frames`, `iframes`, `tabless`, `cookies`, `javascript`, `ismobiledevice`, `cssversion`, 
`device_type`, `device_pointing_method`, `browser_modus`, `minorver`, `platform_version`, `alpha`, `beta`, `win16`, `win32`, `win64`, 
`backgroundsounds`, `vbscript`, `activexcontrols`, `istablet`, `issyndicationreader`, `crawler`, `isfake`, `isanonymized`, 
`ismodified`, `new_privacy_score` , `cvss_score` 
FROM agentstrings 
WHERE browser_bits=$colvals[2] and platform_bits=$colvals[5] and browser_type like '$colvals[18]' and device_type like '$colvals[29]' 
and platform_maker like '$colvals[6]' and platform_description like '$colvals[4]' 
AND (new_privacy_score + cvss_score < $final_score) and `version` not like '0.0' ORDER BY (new_privacy_score + cvss_score) ASC, version DESC limit 25";

$bCounter = 1;
$lCounter = 1;
$result1 = $conn->query($stmt1);
echo "<hr style='width:500px;text-align: center;margin:auto; margin-bottom:10px'>";
echo "<h4>Alternative Browsers Selected:</h4>";
// echo "<pre>" . $result1->num_rows . "</pre>";
$browsers = array();
if (mysqli_num_rows($result1) > 0) {
    while ($row = $result1->fetch_assoc()) {
        if (in_array($row['browser'], $browsers)) {
            --$bCounter;
            continue;
        }
        if ($lCounter > 5) {
            break;
        }
        array_push($browsers, $row['browser']); 
        echo "<h5> $lCounter. " .
            $row['browser'] . " " . $row['version'] . " "  . $row['browser_bits'] .
            " bit for " . $row['platform'] . " " . $row['platform_bits'] . " bit | Total Score: <b id ='scoreColor'>" . ($row['new_privacy_score'] + $row['cvss_score']) . "</b>"
            . "</h5>";
        ++$bCounter;
        ++$lCounter;
    }
} else {
    echo "<pre> There are no browsers with a lower score that satisfies your system requirements! </pre><br><br>";
}
