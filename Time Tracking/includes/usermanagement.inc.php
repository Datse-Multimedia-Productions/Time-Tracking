<?php

function userExists($username) {
	require 'includes/dbconnect.inc.php';

	$sql='SELECT COUNT(*) FROM users WHERE username = (?)';

	if (!$stmt = $dbh->prepare($sql)) {
		echo "Prepare failed: (" . $dbh->errno . ") " . $dbh->error;
	}

	if (!$stmt->bind_param("s", $username)) {
		echo "Binding of paramaters failed: ($stmt->errno) $stmt->error";
	}
	if (!$stmt->execute()) {
		echo "Execute failed: ($stmt->errno) $stmt->error";
	}
	$row = $stmt->fetch();
	if ($row[0] > 0) {
		return TRUE;
	} else {
		return FALSE;
	}

}


function addUser($username, $password, $email) {
	require 'includes/dbconnect.inc.php';
	require 'includes/debug.inc.php';
	
	$debug=TRUE;

	$sql='INSERT INTO users SET username = (?), password = (?), email = (?), created = NOW()';

	if (!$stmt = $dbh->prepare($sql)) {
		echo "Prepare failed: ($stmt->errno) $stmt->error";
	}

	if (!$stmt->bind_param("sss", $username, $password, $email)) {
		echo "Binding of paramaters failed: ($stmt->errno) $stmt->error";
	}

	if (!$stmt->execute()) {
		echo "Execute failed: ($stmt->errno) $stmt->error";
	}

	$row = $stmt->fetch();

	if ($row[0] > 0) {
		debug("looks like user was added");
		return TRUE;
	} else {
		debug("looks like user was not added, but why, we should have had an error");
		return FALSE;
	}

}

function userHasRole($username, $role) {
	require 'includes/dbconnect.inc.php';

	$sql='SELECT COUNT(*) FROM user INNER JOIN userrole ON
		      user.id = userid INNER JOIN role on role.id WHERE 
		      user.username = (?) AND role.name = (?)';

	if (!$stmt = $dbh->prepare($sql)) {
		echo "Prepare failed: ($dbh->errno) $dbh->error";
	}

	if (!$stmt->bind_param("ss", $username, $role)) {
		echo "Binding of paramaters failed: ($stmt->errno) $stmt->error";
	}

	if (!$stmt->execute()) {
		echo "Execute failed: ($stmt->errno) $stmt->error";
	}

	$row = $stmt->fetch();

	if ($row[0] > 0) {
		return TRUE;
	} else {
		return FALSE;
	}

}

function roleExists($rolename) {
	require 'includes/dbconnect.inc.php';

	$sql = 'SELECT COUNT(*) FROM roles WHERE name = (?)';

	if (!$stmt = $dbh->prepare($sql)) {
		echo "Prepare failed: ($dbh->errno) $dbh->error";
	}

	if (!$stmt->bind_param("s", $rolename)) {
		echo "Binding of paramaters failed ($stmt->errno) $stmt->error";
	}

	if (!$stmt->execute()) {
		echo "Execute failed: ($stmt->errno) $stmt->error";
	}

	$row = $stmt->fetch();

	if ($row[0] > 0) {
		return TRUE;
	} else {
		return FALSE;
	}
}

function addRole($rolename, $roledescription) {
	require 'includes/dbconnect.inc.php';

	$sql = 'INSERT INTO roles SET name = (?), description = (?)';

	if (!$stmt = $dbh->prepare($sql)) {
		echo "Prepare failed ($dbh->errno) $dbh->error";
	}

	if (!$stmt->bind_param("ss", $rolename, $roledescription)) {
		echo "Binding of paramaters failed ($stmt->errno) $stmt->error";
	}

	if (!$stmt->execute()) {
		echo "Execute failed: ($stmt->errno) $stmt->error";
	}

	$row = $stmt->fetch();

	if ($row[0] > 0) {
		return TRUE;
	} else {
		return FALSE;
	}
}

function loginSuccessful($username, $password) {
	require 'includes/dbconnect.inc.php';
	
	$sql = 'SELECT COUNT(*) FROM users WHERE username=(?) AND password=(?)';
	
	if (!$stmt = $dbh->prepare($sql)) {
		echo "Prepare failed ($dbh->errno) $dbh->error";
	}
	
	if (!$stmt->bind_param("ss", $username, $password)) {
		echo "Binding paramaters failed ($stmt->errno) $stmt->error";
	}
	
	if (!$stmt->execute()) {
		echo "Execute failed: ($stmt->errno) $stmt->error";
	}
	
	$row = $stmt->fetch();
	
	if ($row[0] > 0) {
		
		session_start();
		
		$_SESSION["logedin"]='1';
		$_SESSION["username"]=$username;
		$_SESSION["password"]=$password;
		
		echo "Login successful";
	
		return TRUE;
	} else {
		return FALSE;
	}
}

?>