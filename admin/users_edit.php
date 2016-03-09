<?php
require "../db_conn.php";
require "access.php";
checkAccess();

$getname = isset($_GET['name']) ? $_GET['name'] : header("location: users.php");

$query = "SELECT * FROM user where name='$getname'";
$result = $db->query($query);
$users = $result->fetch_assoc();


if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$name = isset($_POST['user']) ? $_POST['user'] : header("location: users.php?nocred");
	$password = isset($_POST['password']) ? $_POST['password'] : header("location: users.php?nocred");

	if(preg_match("/(['`%\",$#\*]+)/", $name)) {
		echo "<p>Invalid username.<br>Username may only contain letters(a-z) and numbers(0-9)</p>";
	}else{
		$stmt = $db->prepare("UPDATE user SET name=?, password=? WHERE name=?");
		$stmt->bind_param("sss", $name, $password, $getname);

		$stmt->execute();
	}


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
<h1>change username and password</h1>
	<form method="post">
		<label for="user">Username:</label>
		<input type="text" id="user" name="user" value="<?=$users['name']?>" required>
		<br>
		<label for="password">password:</label>
		<input type="password" id="password" name="password" value="<?=$users['password']?>" required>

		<input type="submit">			
	</form>
</body>
</html>