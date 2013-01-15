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
		echo "username $username password $password email $email";
		addUser($username, $password, $email);
	} 
}


include 'view/createuser.html.php';

