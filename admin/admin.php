<?php
require "../db_conn.php";
$query = "SELECT * FROM pagecontent";
$result = $db->query($query);
$content = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/admin.css">
</head>
<body>
<a href="create.php">Pagina toevoegen</a>
	<table>
		<th>Pagina</th>
		<th>Inhoud</th>
		<th>Menu-optie</th>

<?php
		foreach ($content as $content) { ?>
		<tr>
			<td><?=$content['page']?></td>
			<td><?=$content['content']?></td>
			<td><?=$content['menuoption']?></td>
		</tr>
			
<?php	}
?>
	</table>
</body>
</html>