<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Create a Role</title>
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
</body>
</html>
