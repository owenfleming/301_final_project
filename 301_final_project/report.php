<?php
//start session
session_start();

//include config
include('config.php');

//Include functions
include('functions.php');


 //determine type of report
 if($_SESSION['type'] == 'co2'){
    $sql = file_get_contents('sql/getCarbon.sql');
}
else if($_SESSION['type'] == 'hydro'){
    $sql = file_get_contents('sql/getHydro.sql');
}
else{
    $sql = file_get_contents('sql/getAllEnergy.sql');
}

$params = array( 
    'code' => $_SESSION['code'],
    'minYear' => $_SESSION['minYear'],
    'maxYear' => $_SESSION['maxYear']
);

$statement = $database->prepare($sql);
$statement->execute($params);
$report = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>Energy</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<div class="page">
        <h1>Custom Report for <?php echo $_SESSION['code'] ?></h1>
    <?php if (count($report) > 0): ?>
    <table>
        <thead>
            <tr>
                <th><?php echo implode('</th><th>', array_keys(current($report))); ?></th>
            </tr>
        </thead>
        <tbody>
    <?php foreach ($report as $row): array_map('htmlentities', $row); ?>
        <tr>
            <td><?php echo implode('</td><td>', $row); ?></td>
        </tr>
    <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
		
    </div>
    <a href="index.php">Home</a>
</body>
</html>