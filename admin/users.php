<?php
require "../db_conn.php";
require "access.php";
checkAccess();

$query = "SELECT * FROM user";
$result = $db->query($query);
$users = $result->fetch_all(MYSQLI_ASSOC);

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
				<h2>users</h2>
			</div>
			<a href="users_create.php">Toevoegen</a>
			<table>
				<tr>
					<th>user</th>
					<th>password</th>
				</tr>
		<?php
				foreach ($users as $user) {
				$name = $user['name'];
		?>
				<tr>
					<td><?=$name?></td>
					<td><?=$user['password']?></td>
					<td><a href="users_edit.php?name=<?=$name?>">edit</a></td>
					<td><a href="users_delete.php?name=<?=$name?>">delete</a></td>
				</tr>
			<?php
				}
			?>
			</table>
		</div>
	</div>
</body>

</html>