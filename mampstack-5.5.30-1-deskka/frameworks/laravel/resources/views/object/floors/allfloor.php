<?php


$nameArray = array();
foreach ($allfloor as $floor) {
	$test_unit = array('id' =>  $floor -> name);
	array_push($nameArray, $test_unit);
}

echo json_encode($nameArray);

?>