<?php

function userExists($username) {
	require_once 'includes/dbconnect.inc.php';

	$sql='SELECT COUNT(*) FROM users WHERE username = :username';

	if (!$stmt = $dbh->prepare($sql)) {
		echo "Prepare failed: ($dbh->errno) $dbh-error";
	}

	if (!$stmt->bind_param(":username", $username)) {
		echo "Binding of paramaters failed: ($dbh->errno) $dbh-error";
	}

	if (!stmt->execute()) {
		echo "Execute failed: ($dbh->errno) $dbh-error"
	}

	$row = $stmt->fetch();

	if ($row[0] > 0) {
		return TRUE;
	} else {
		return FALSE;
	}

}


function addUser($username, $password, $email) {
	require_once 'includes/dbconnect.inc.php';

	$sql='INSERT INTO users SET username = :username, password = :password, email = :email, created = NOW()';

	if (!$stmt = $dbh->prepare($sql)) {
		echo "Prepare failed: ($dbh->errno) $dbh-error";
	}

	if (!$stmt->bind_param(":username", $username)) {
		echo "Binding of paramaters failed (username): ($dbh->errno) $dbh-error";
	}

	if (!$stmt->bind_param(":password", $password)) {
		echo "Binding of paramaters failed (password): ($dbh->errno) $dbh-error";
	}
	if (!$stmt->bind_param(":email", $email)) {
		echo "Binding of paramaters failed (email): ($dbh->errno) $dbh-error";
	}

	if (!stmt->execute()) {
		echo "Execute failed: ($dbh->errno) $dbh-error"
	}

	$row = $stmt->fetch();

	if ($row[0] > 0) {
		return TRUE;
	} else {
		return FALSE;
	}

}

?>