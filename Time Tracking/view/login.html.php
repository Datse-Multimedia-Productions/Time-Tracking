<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Login</title>
</head>
<body>

<?php if (isset($loginerrors)): ?>
	<p>An error has occurred:</p>
	<ul>
	<?php
	foreach ($loginerrors as $error) {
		echo '<li class="error">' . $error . "</li>\n";
	}
	?>
	</ul>
	<?php endif; ?>

<?php if (!$_SESSION["loggedin"]==1): ?>
	<form action="" method="post">
		<label for="username">Username: </label><input type="text"
			name="username" id="username">
			<?php echo $newusername ?>
		</input><br /> <label for="password">Password: </label><input
			type="password" name="password" id="password">
			<?php echo $newpassword ?>
		</input><br /> <input type="hidden" name="action" value="login" />
		<input type="submit" value="Login" />
	</form>
	<?php 
		echo '$_SESSION=';
		print_r($_SESSION); 
	?>
	<?php else: ?>
	<p>You are logged in</p>
	<?php endif; ?>
</body>
</html>
