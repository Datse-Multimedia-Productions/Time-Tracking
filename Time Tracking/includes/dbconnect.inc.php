<?php

$mysqluser = 'root';
$mysqlpass = 'Tia8cpw!';
$mysqlhost = 'localhost';
$mysqldb = 'timetracking';

/*
 try{
 $dbh = new PDO('mysql:host=$mysqlhost',$mysqluser, $mysqlpass);
 } catch (PDOException $error) {
 print "Error!: ". $error->getMessage() . "<br/>";
 die();
 }
 */

$dbh = new mysqli($mysqlhost, $mysqluser, $mysqlpass, $mysqldb);
if ($dbh->connect_errno) {
	echo "failed to connect $dbh->connect_errno: $dbh->connect_error";
}


?>

