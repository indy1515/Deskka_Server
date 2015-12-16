<?php


$nameArray = array();
foreach ($tests as $test) {
	$test_unit = array('name' =>  $test -> name);
	array_push($nameArray, $test_unit);
}

echo json_encode($nameArray);

?>