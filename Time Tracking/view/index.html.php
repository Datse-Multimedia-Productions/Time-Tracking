<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Create a User</title>
</head>
<body>

<?php if (isset($usercreateerror)): ?>
	<p>An error has occurred:</p>
	<ul>
	<?php
	foreach ($usercreateerror as $error) {
		echo '<li class="error">' . $error . "</li>i\n";
	}
	?>
	</ul>
	<?php endif; ?>

	<form action="" method="post">
		<input type="radio" name="action" id="login" value="login" /><label for="login">Login</label><br />
		<input type="radio" name="action" id="createuser" value="createuser" /><label for="createuser">Create User</label><br />
		<input type="radio" name="action" id="createrole" value="createrole" /><label for="createrole">Create Role</label><br />
		<input type="submit" value="Select Action" />
	</form>
</body>
</html>
