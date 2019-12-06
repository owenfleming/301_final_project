<?php

//include config and functions
include('config.php');

include('functions.php');

//get search term
$term = get('search-term');

//get results from searching database
$countries = searchCountries($term, $database);

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>Countries</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div>
		<h1>International Energy Metrics</h1>
		<form method="GET">
			<input type="text" name="search-term" placeholder="Search for a country..." />
			<input type="submit" /><br/>
		</form>
	</div>
		<div class="card">
		<?php foreach($countries as $country) : ?>
		
				<a href = "country.php?code=<?php echo $country['code']?>"><?php echo $country['name']; ?></a><br />
				<!--<h3>Country code: <?php //echo $country['code']; ?> </h3><br />
				<h3>Population: <?php //echo number_format($country['population'],0,".",","); ?> </h3><br />
-->
		<?php endforeach; ?>
		
		<!-- print currently accessed by the current username 
		<p>Currently logged in as: <?php //echo $customer->getCustomerName() ?></p> -->
		
		<!-- A link to the logout.php file -->
		<p>
            <a href="formAdd.php">Add Country</a><br />
            
            <a href="editReport.php">Make a Custom Report</a>
		</p>
	</div>
</body>
</html>