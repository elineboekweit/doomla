<?php
require "../db_conn.php";
require "access.php";
checkAccess();
$message = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$user = isset($_POST['user']) ? $_POST['user'] : null;
	$password = isset($_POST['password']) ? $_POST['password'] : null;
	
	$stmt = $db->prepare("SELECT name FROM user WHERE name=?");
	$stmt->bind_param("s", $user);
	$stmt->execute();
	$stmt->store_result();	

	if ($stmt->num_rows() > 0) {
		$message = "username already exitsts.";
	}else {
		if(preg_match("/[^-a-z0-9_.-]/", $user)) { 
			$message = "<p>Invalid username.<br>Username may only contain letters(a-z) and numbers(0-9)</p>";
		}else {
		$stmt = $db->prepare("INSERT INTO user (name, password)
			VALUES (?, ?)");
		$stmt->bind_param("ss", $user, $password);
		$stmt->execute();
			
		header("location: users.php");	
		}
	}
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
				<h2>create user</h2>
			</div>
			<?=$message?>
				<form method="post">
					<label for="user">Username:</label>
					<input type="text" id="user" name="user" required>
					<br>
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" required>

					<input type="submit">
				</form>	
		</div>
	</div>
</body>

</html>