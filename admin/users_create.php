<?php
require "../db_conn.php";
require "access.php";
checkAccess();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$user = isset($_POST['user']) ? $_POST['user'] : null;
	$password = isset($_POST['password']) ? $_POST['password'] : null;
	
	$stmt = $db->prepare("SELECT name FROM user WHERE name=?");
	$stmt->bind_param("s", $user);
	$stmt->execute();
	$stmt->store_result();	

	if ($stmt->num_rows() > 0) {
		echo "username already exitsts.";
	}else {
		if(preg_match("/(['`%\",$#\*]+)/", $user)) {
			echo "<p>Invalid username.<br>Username may only contain letters(a-z) and numbers(0-9)</p>";
		}else {
		$stmt = $db->prepare("INSERT INTO user (name, password)
			VALUES (?, ?)");
		$stmt->bind_param("ss", $user, $password);
		$stmt->execute();
			
		}
		header("location: users.php");	
	}
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
		<input type="text" id="user" name="user" required>
		<br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required>

		<input type="submit">
	</form>			
</body>
</html>