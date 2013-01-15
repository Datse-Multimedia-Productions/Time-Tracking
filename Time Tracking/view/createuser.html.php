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
		<label for="username">Username: </label><input type="text"
			name="username" id="username">
			<?php echo $newusername ?>
		</input><br /> 
		<label for="email">Email: </label><input
			type="text" name="email" id="email">
			<?php echo $newemail ?>
		</input><br /> 
		<label for="password">Password: </label><input
			type="password" name="password" id="password">
			<?php echo $newpassword ?>
		</input><br /> 
		<input type="hidden" name="action" value="createuser" />
		<input type="submit" value="Create User" />
	</form>
</body>
</html>
