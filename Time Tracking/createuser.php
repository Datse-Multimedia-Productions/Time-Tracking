<?php


require_once 'includes/usermanagement.inc.php';

$newusername="";
$newpassword="";
$newemail = "";

$action=htmlentities($_POST["action"]);
$username=htmlentities($_POST["username"]);
echo $username;
echo $_POST["username"];
$password=md5($_POST["password"]);
echo $_POST["password"];
$email=htmlentities($_POST["email"]);
echo $email;
echo $_POST["email"];

echo

$usercreateerror=NULL;
$erors = FALSE;



if (isset($action) && $action=="createuser") {
	echo $action;
	if (isset($action)) {
		echo '$action is set';
	}
	if ($action=="createuser") {
		echo '$action == "createuser"';
	}
	echo "action = $action username = $username password = $password email = $email";
	echo 1;
	if (!isset($username) || $username=='') {
		echo 2;
		$usercreateerror[]="Please enter a username";
		$errors = TRUE;
	}
	echo 3;
	if (!isset($email) || $email=='') {
		echo 4;
		$usercreateerror[]="Please enter an email address";
		$errors = TRUE;
	}
	echo 5;
	if (!isset($_POST["password"]) || $_POST["password"]=='') {
		echo 6;
		$usercreateerror[]="Please enter a password";
		$errors = TRUE;
	}
	echo 7;
	echo (userExists($username));
	if (userExists($username)) {
		echo 8;
		$usercreateerror[]="Username '$username' already exists please select a new one";
		$errors = TRUE;
	}
	echo 9;
	if ($errors==FALSE) {
		echo 10;
		echo "username $username password $password email $email";
		addUser($username, $password, $email);
		echo 11;
	} else {
			
		foreach ($usercreateerror as $error) {
			echo "ERROR $error";
		}
	}
	echo 12;
}

echo 13;

include 'view/createuser.html.php';

echo 14;
