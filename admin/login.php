<?php
	$message = "";
	if (isset($_GET['nocred'])) {
		$message = "Username or password is incorrect";
	}elseif (isset($_GET['usercookie']) || isset($_GET['tokencookie'])){
		$message = "session timed out.";
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
			<h1 id="title" class="hidden">Inloggen</h1>
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Log In</h2>
			</div>
			<?=$message?>
			<form action="login.logic.php" method="post">
				<label for="username">Username</label>
				<br>
				<input type="text" id="username" name="username" required>
				<br>
				<label for="password">Password</label>
				<br>
				<input type="password" id="password" name="password" required>
				<br>
				<button type="submit" value="Aanmelden">Sign In</button>
				<br>
			</form>
		</div>
	</div>
</body>

</html>


