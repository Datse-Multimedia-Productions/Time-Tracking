<?php

require 'includes/usermanagement.inc.php';

$action=htmlentities($_POST["action"]);
$username=htmlentities($_POST["username"]);
$password=md5($_POST["password"]);

$loginerrors = NULL;
$errors = FALSE;

if (isset($action) && $action=="login") {
	if (!isset($_POST["username"]) || $username=='') {
		$loginerrors[]="A username must be entered";
		$errors=TRUE;
	}
	if (!isset($_POST["password"]) || $_POST["password"]='') {
		$loginerrors[]="A password must be set";
		$errors=TRUE;
	}
	if ($errors==FALSE) {
		if (!loginSuccessful($username, $password)) {
			$loginerrors[]="Login Unsuccessful Username or Password Not on File";
			$errors=TRUE;
		}
	}
}

include "view/login.html.php";

