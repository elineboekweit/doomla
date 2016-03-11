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

	if(preg_match("/[^-a-z0-9_.-]/", $name)) {
		echo "<p>Invalid username.<br>Username may only contain letters(a-z) and numbers(0-9)</p>";
	}else{
		if (isset($_POST['confirmed'])) {
			$stmt = $db->prepare("UPDATE user SET name=?, password=? WHERE name=?");
			$stmt->bind_param("sss", $name, $password, $getname);

			$stmt->execute();
		}
	}
	header("location: users.php");

}
?>


<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Login doomla</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/login.css">

</head>

<body>
	<div class="container">
		<div class="top">
			<h1 id="title" class="hidden">Users beheren</h1>
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>change username and password</h2>
			</div>
			<form method="post">
				<label for="user">Username:</label>
				<input type="text" id="user" name="user" value="<?=$users['name']?>" required>
				<br>
				<label for="password">password:</label>
				<input type="password" id="password" name="password" value="<?=$users['password']?>" required>

				<br>
				<input type="submit" name="confirmed" value="Yes">
				<input type="submit" name="canceled" value="No">			
			</form>
		</div>
	</div>
</body>

</html>