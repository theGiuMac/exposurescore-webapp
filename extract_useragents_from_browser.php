<?php
require "arrays.php";
require "agentstrings.php";


$info = get_browser($useragent, true);

//print_r($info)

$colvals = array_fill(0, 50, 0.0);
$numofnulls = 0;
foreach ($info as $heading => $value) {
    $pos = array_search($heading, $cols); // return position of value from heading
    if ($pos != false) {
        if ($heading == "browser_name_regex" || $heading == "browser_name_pattern" || $heading == "aolversion") {
            $value = -999;
        } else if (($types[$pos] == "f" ||  $types[$pos] == "i") && empty($value)) {
            $numofnulls += 1;
            $value = -1;
        } else if ($types[$pos] == "v" && empty($value)) {
            $numofnulls += 1;
            $value = "unknown";
        }
    } else if ($heading == "parent") {
        $value = $value;
    } else {
        $value = -999;
    }
    if ($value != -999) {
        if ($types[$pos] == "f") {
            settype($value, "float");
        } else if ($types[$pos] == "i") {
            settype($value, "integer");
        } else if ($types[$pos] == "v") {
            settype($value, "string");
        }
        $colvals[$pos] = $value;
    }
    $colvals[0] = null;
    
    // this was `privacy_score`, now is `num_of_exposed_attributes`
    $colvals[48] = 47 - $numofnulls;    
}

if (strpos($useragent, 'Instagram') !== false) {
    $pos = strpos($useragent, 'Instagram');
    //echo $pos;
    $version = substr($useragent, $pos + 10, 15);
    $colvals[20] = $version;
}


