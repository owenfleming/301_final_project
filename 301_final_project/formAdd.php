<?php
include('config.php');

// If form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$code = $_POST['code'];
	$name = $_POST['country-name'];
	$population = $_POST['population'];
	
    // Insert country
    $sql = file_get_contents('sql/insertCountry.sql');
    $params = array(
        'code' => $code,
        'name' => $name,
        'population' => $population
    );

    $statement = $database->prepare($sql);
    $statement->execute($params);
    
    // Redirect to listing page
    header('location: index.php');
    
}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>Add Country</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<div>
		<h1>Add Country</h1>
		<form action="" method="POST">
			<div class="form-element">
				<label>Code:</label>
				<input type="text" name="code" class="textbox" value="" />
			</div>
			<div>
				<label>Name:</label>
				<input type="text" name="country-name" class="textbox" value="" />
			</div>
			<div>
				<label>Population:</label>
				<input type="number" name="population" class="textbox" value="" />
			</div>
			<div>
				<input type="submit" class="button" />&nbsp;
				<input type="reset" class="button" />
			</div>
		</form>
	</div>
</body>
</html>