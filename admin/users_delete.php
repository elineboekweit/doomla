<?php
require "../db_conn.php";
require "access.php";
checkAccess();

if ($_SERVER['REQUEST_METHOD'] == "GET") {
	//if (isset($_GET['name'])) {
		$name = $_GET['name'];

		$query = "SELECT name FROM user WHERE name='$name'";
		$result = $db->query($query);

		$username = $result->fetch_assoc();
		var_dump($username);

//	}
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	//if (isset($_POST['confirmed'])) {
		$name = $_POST['name'];

		$query = "DELETE FROM user WHERE name=$name";
		$result = $db->query($query);
		//header("location: users.php");
	}
//}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="">
</head>
<body>

</body>
</html>



<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Login doomla</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>


	<link rel="stylesheet" href=""> <!--css/login.css-->

</head>

<body>
	<div class="container">
		<div class="top">
			<h1 id="title" class="hidden">Users beheren</h1>
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Delete user</h2>
			</div>
			<form method="post">
				<input type="hidden" name="name" value="<?=$username['name']?>">
				<label for="name"> Username:</label>
				<span><?=$username['name']?></span>
				<br>
				<input type="submit" name="confirmed" value="Yes">
				<input type="submit" name="canceled" value="No">
			</form>
		</div>
	</div>
</body>

</html>

