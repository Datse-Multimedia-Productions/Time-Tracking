<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Create a Role</title>
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
		<label for="rolename">Role Name: </label><input type="text"
			name="rolename" id="rolename">
			<?php echo $newrolename ?>
		</input><br /> <label for="roledescription">Role Description: </label><input
			type="text" name="roledescription" id="roledescription">
			<?php echo $newroledescription ?>
		</input><br /> <input type="hidden" name="action" value="createrole" />
		<input type="submit" value="Create Role" />
	</form>
</body>
</html>
