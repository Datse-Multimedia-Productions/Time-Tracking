<?php

$postgresuser = 'postgres';
$postgrespass = '';

try{
	$dbh = new PDO('pgsql:host=localhost',$postgresuser, $postpass);
} catch (PDOException $error) {
	print "Error!: ". $error->getMessage() . "<br/>";
	die();
}

?>
