<?php

//include config
include('config.php');

//Include functions
include('functions.php');

// Get the country code
$code = get('code');

//create country object
my_autoloader('Country');
$country = new Country($code, $database); 


?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>Country</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<div class="card">
        <h1>Current Energy Statistics for <?php echo $country->getCountryName() ?></h1>

        <h4>Population: <?php echo number_format($country->getPopulation(),0, ".",",") ?> </h4><br/>
        
        <h4>Hydroelectric consumption: <?php echo number_format($country->perCapitaHydro(),2) ?> megawatt hours per person </h4><br/>

        <h4>CO2 emissions: <?php echo number_format($country->perCapitaCarbon(),2) ?> tonnes per person</h4><br/>
	</div>

	<a href="index.php">Home</a>
</body>
</html>