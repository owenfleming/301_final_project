<?php
//start report session
session_start();

// include config
include('config.php');

// include functions
include('functions.php');



$sql = file_get_contents('sql/getCountryNames.sql');
$statement = $database->prepare($sql);
$statement->execute();
$countries = $statement->fetchAll(PDO::FETCH_ASSOC); 

// If form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$_SESSION["code"] = $_POST['code'];
	$_SESSION['type'] = $_POST['type'];
	$_SESSION['minYear'] = $_POST['minYear'];
	$_SESSION['maxYear'] = $_POST['maxYear'];
	

    	
	// Redirect to report page
	header('location: report.php');
}

// In the HTML, if an edit form:
	// Populate textboxes with current data of book selected 
	// Print the checkbox with the book's current categories already checked (selected)
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>Generate Report</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<div class="page">
		<h1>Generate Report</h1>
		<form action="" method="POST">

			<div >
				<label>Energy Type:</label><br />
                <input type="radio" name="type" class="textbox" value="hydro" checked/><span class="radio-label">Hydroelectric Consumption</span><br />
                <input type="radio" name="type" class="textbox" value="co2" /><span class="radio-label">CO2 Emissions</span><br />
                <input type="radio" name="type" class="textbox" value="both" /><span class="radio-label">Both</span><br />
			</div>
			<div >
				<label>Countries:</label><br />
				<?php foreach($countries as $country) : ?>
						<input class="radio" type="radio" name="code" value="<?php echo $country['code'] ?>" /><span class="radio-label"><?php echo $country['name'] ?></span><br />
				<?php endforeach; ?>
			</div>
			<div>
                <h4> Note that current data ranges from 2003 to 2018 (2016 for Hydroelectric data) </h4>
				<label>From Year:</label>
				<input type="text" name="minYear" class="textbox" value="" />
			</div>
			<div >
				<label>To Year:</label>
				<input type="number" step="any" name="maxYear" class="textbox" value="" />
			</div>
			<div>
				<input type="submit" class="button" />&nbsp;
				<input type="reset" class="button" />
			</div>
		</form>
	</div>
	<a href="index.php">Home</a>
</body>
</html>