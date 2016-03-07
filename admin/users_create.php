<?php
require "../db_conn.php";
require "access.php";
checkAccess();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$stmt = $db->prepare("INSERT INTO user (name, password)
		VALUES (?, ?)");
	$stmt->bind_param("ss", $user, $password);
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form method="post">
		<label for="user">Username:</label>
		<input type="text" id="user" name="user" value="" required>
		<br>
		<label for="password">password:</label>
		<input type="password" id="password" name="password" required>

		<input type="submit">
	</form>			
</body>
</html>