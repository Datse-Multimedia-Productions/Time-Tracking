<?php
require 'includes/usermanagement.inc.php';

$action = htmlentities($_POST["action"]);
$rolename = htmlentities($_POST["rolename"]);
$roledescription = htmlentities($_POST["roledescription"]);

$createroleerrors = NULL;
$errors = FALSE;

if (isset($action) && $action=="createrole") {
	if (!isset($_POST["rolename"]) || $rolename=='') {
		$createroleerrors[]="A Role name must be entered";
		$errors=TRUE;
	}
	if (roleExists($rolename)) {
		$createroleerrors[]="Role already exists";
		$errors=TRUE;
	}
	if ($errors==FALSE) {
		addRole($rolename, $roledescription);
	}
}

include 'view/editroles.html.php';