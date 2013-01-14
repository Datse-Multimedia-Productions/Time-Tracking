<?php

require_once 'dbconnect.inc.php';

require_once 'includes/usermanagement.inc.php';

$newusername="";
$newpassword="";
$newemail = "";

$action=htmlentities($_POST["action"]);
$username=htmlentities($_POST["username"]);
$password=md5($_POST["password"]);
$email=htmlentities($_POST[email]);

$usercreateerror=NULL;



if (isset($action) && $action="createuser") {
	if (!isset($username) || $username='') {
		$usercreateerror[]="Please enter a username";
	}
	if (!isset($email) || $email='') {
		$usercreateerror[]="Please enter an email address";
	}
	if (!isset($_POST["password"]) || $_POST["password"]='') {
		$usercreateerror[]="Please enter a password";
	}
	if (userExists($username)) {
		$usercreateerror[]="Username '$username' already exists please select a new one";
	}
	if ($usercreateerror=NULL) {
		addUser($username, $password, $email);
	}
}


include 'view/createuser.html.php';


