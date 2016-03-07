<?php
require "../db_conn.php";
require "access.php";
checkAccess();

$query = "SELECT * FROM user";
$result = $db->query($query);
$users = $result->fetch_all(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="">
</head>
<body>
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
			<td><a href="users_delete.php">delete</a></td>
		</tr>
	<?php
		}
	?>
	</table>
	
</body>
</html>