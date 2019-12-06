<?php

function searchCountries($term, $database) {
	// Get list of countries
	$term = $term . '%';
	$sql = file_get_contents('sql/getCountries.sql');
	$params = array(
		'term' => $term
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$countries = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $countries;
}


function get($key) {
	if(isset($_GET[$key])) {
		return $_GET[$key];
	}
	
	else {
		return '';
	}
}
?>