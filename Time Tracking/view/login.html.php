<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Login</title>
</head>
<body>

<?php if (isset($loginerror)): ?>
	<p>An error has occurred:</p>
	<ul>
	<?php
	foreach ($usercreateerror as $error) {
		echo '<li class="error">' . $error . "</li>i\n";
	}
	?>
	</ul>
	<?php endif; ?>

<?php if ($_SESSION["loggedin"]!=1): ?>
	<form action="" method="post">
		<label for="username">Username: </label><input type="text"
			name="username" id="username">
			<?php echo $newusername ?>
		</input><br /> <label for="password">Password: </label><input
			type="text" name="password" id="password">
			<?php echo $newpassword ?>
		</input><br /> <input type="hidden" name="action" value="login" />
		<input type="submit" value="Create Role" />
	</form>
	<?php else: ?>
	<p>You are logged in</p>
	<?php endif; ?>
</body>
</html>
