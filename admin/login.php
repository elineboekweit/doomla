<?php
	if (isset($_GET['nocred'])) {
		echo "username or password wrong";
	}elseif (isset($_GET['usercookie']) || isset($_GET['tokencookie'])){
		echo "session timed out.";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>aanmelden</h1>
	<form action="login.logic.php" method="post">
		<label for="user">Gebruiker:</label>
		<input type="text" id="username" name="username" required>
		<br>
		<label for="password">Wachtwoord:</label>
		<input type="password" id="password" name="password" required>
		<br>
		<input type="submit" value="Aanmelden">
	</form>
</body>
</html>