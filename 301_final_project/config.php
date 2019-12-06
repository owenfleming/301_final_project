<?php
// Connecting to the MySQL database
$user = 'flemingo1';
$password = '8b2060de';

$database = new PDO('mysql:host = csweb.hh.nku.edu; dbname=db_fall19_flemingo1', $user, $password);


//autoloader function
function my_autoloader($class){
	include 'class.' . $class . '.php';
}

spl_autoload_register('my_autoloader');


?>