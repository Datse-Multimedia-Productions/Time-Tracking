<?php


require_once 'includes/usermanagement.inc.php';
require 'includes/debug.inc.php';

$debug=TRUE;

$newusername="";
$newpassword="";
$newemail = "";

$action=htmlentities($_POST["action"]);
$username=htmlentities($_POST["username"]);
$password=md5($_POST["password"]);
$email=htmlentities($_POST["email"]);


$usercreateerror=NULL;
$erors = FALSE;

debug("Entering Control structure", $debug);

if (isset($action) && $action=="createuser") {
	debug("We think we have a subbmitted form", $debug);
	if (!isset($username) || $username=='') {
		$usercreateerror[]="Please enter a username";
		$errors = TRUE;
	}
	if (!isset($email) || $email=='') {
		$usercreateerror[]="Please enter an email address";
		$errors = TRUE;
	}
	if (!isset($_POST["password"]) || $_POST["password"]=='') {
		$usercreateerror[]="Please enter a password";
		$errors = TRUE;
	}
	echo (userExists($username));
	if (userExists($username)) {
		$usercreateerror[]="Username '$username' already exists please select a new one";
		$errors = TRUE;
	}
	if ($errors==FALSE) {
		debug("We are adding the user", $debug);
		addUser($username, $password, $email);
	} 
}


include 'view/createuser.html.php';

