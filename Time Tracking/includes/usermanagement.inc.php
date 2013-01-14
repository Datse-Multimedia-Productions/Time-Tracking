<?php

function userExists($username) {
	echo "A";
	require 'includes/dbconnect.inc.php';
	echo "B";

	echo "C";
	$sql='SELECT COUNT(*) FROM users WHERE username = (?)';
	echo "D";

	echo "E";
	if (!$stmt = $dbh->prepare($sql)) {
		echo "E1";
		echo "Prepare failed: (" . $dbh->errno . ") " . $dbh->error;
		echo "E2";
	}

	echo "F";
	if (!$stmt->bind_param("s", $username)) {
		echo "Binding of paramaters failed: ($stmt->errno) $stmt->error";
	}
	echo "G";
	if (!$stmt->execute()) {
		echo "Execute failed: ($stmt->errno) $stmt->error";
	}
	echo "H";
	$row = $stmt->fetch();
	echo "I";
	if ($row[0] > 0) {
		echo "J";
		return TRUE;
	} else {
		echo "K";
		return FALSE;
	}

}


function addUser($username, $password, $email) {
	require 'includes/dbconnect.inc.php';

	echo "username $username password $password email $email";

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
		return TRUE;
	} else {
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
?>