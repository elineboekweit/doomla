<?php
require "../db_conn.php";

$order = isset($_GET['sort']) ? $_GET['sort']: 'page';
$ascdesc = isset($_GET['ascdesc']) ? $_GET['ascdesc'] : 'asc';

if(isset($ascdesc) and $ascdesc == "asc"){
	$ascdesc = "desc";
}else{
	$ascdesc = "asc";
}

$query = "SELECT * FROM pagecontent ORDER BY $order $ascdesc";
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
		<th><a href="?sort=page&ascdesc=<?=$ascdesc?>"></a>Pagina</th>
		<th><a href="?sort=content&ascdesc=<?=$ascdesc?>">Inhoud</th>
		<th><a href="?sort=menuoption&ascdesc=<?=$ascdesc?>">Menu-optie</th>
		<th><a href="?sort=menuorder&ascdesc=<?=$ascdesc?>">Menu-order</th>
		<th></th>
		<th></th>

<?php
		foreach ($content as $content) { ?>
		<tr>
			<td><?=$content['page']?></td>
			<td><?=$content['content']?></td>
			<td><?=$content['menuoption']?></td>
			<td><?=$content['menuorder']?></td>
			<td><a href="edit.php?id=<?=$content['id']?>">update</a></td>
			<td><a href="delete.php?id=<?=$content['id']?>">delete</a></td>
		</tr>
			
<?php	}
?>
	</table>
</body>
</html>