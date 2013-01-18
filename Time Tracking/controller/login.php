<?php

require 'includes/usermanagement.inc.php';
require_once 'includes/debug.inc.php';

$debug=TRUE;

$action=htmlentities($_POST["action"]);
$username=htmlentities($_POST["username"]);
$password=md5($_POST["password"]);

$loginerrors = NULL;
$errors = FALSE;

debug("About to enter controler", $debug);

if (isset($action) && $action=="login") {
	debug("In controller", $debug);
	if (!isset($_POST["username"]) || $username=='') {
		$loginerrors[]="A username must be entered";
		$errors=TRUE;
	}
	if (!isset($_POST["password"]) || $_POST["password"]='') {
		$loginerrors[]="A password must be set";
		$errors=TRUE;
	}
	if ($errors==FALSE) {
		debug("Checking Login", $debug);
		if (!loginSuccessful($username, $password)) {
			$loginerrors[]="Login Unsuccessful Username or Password Not on File";
			$errors=TRUE;
		}
	}
}

include "view/login.html.php";

