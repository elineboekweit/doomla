<?php
require "../db_conn.php";
require "access.php";
checkAccess();

if ($_SERVER['REQUEST_METHOD'] == "GET") {
	if (isset($_GET['name'])) {
		$name = $_GET['name'];

		$query = "SELECT name FROM user WHERE name='$name'";
		$result = $db->query($query);
		var_dump($query);
		$username = $result->fetch_assoc();

	}
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['confirmed'])) {
		$name = $_POST['name'];

		$query = "DELETE FROM user WHERE name=$name";
		$result = $db->query($query);
	}
	header("location: users.php");
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
	<form method="post">
		<input type="hidden" name="name" value="<?=$username['name']?>">
		<label for="name"> Username:</label>
		<span><?=$username['name']?></span>
		<br>
		<input type="submit" name="confirmed" value="Yes">
		<input type="submit" name="canceled" value="No">
	</form>
</body>
</html>