<?php
require "../db_conn.php";
require "access.php";

CheckAccess();


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
<nav>
	<ul>
		<li><a href="create.php">Pagina toevoegen</a></li>
		<li><a href="users.php">Gebruikers beheren</a></li>
		<li><a href="logout.php">afmelden</a><!----------></li>
	</ul>
</nav>
	<table>
		<th><a href="?sort=page&ascdesc=<?=$ascdesc?>">Pagina</th></a>
		<th><a href="?sort=menuoption&ascdesc=<?=$ascdesc?>">Menu-optie</th></a>
		<th><a href="?sort=content&ascdesc=<?=$ascdesc?>">Inhoud</th></a>
		<th><a href="?sort=menuorder&ascdesc=<?=$ascdesc?>">Menu-order</th></a>
		<th><a href="?sort=template&ascdesc=<?=$ascdesc?>">Template</th>
		<th></th>
		<th></th>

<?php
		foreach ($content as $content) { ?>
		<tr>
			<td><?=$content['page']?></td>
			<td><?=$content['menuoption']?></td>
			<td><?=$content['content']?></td>
			<td><?=$content['menuorder']?></td>
			<td><?=$content['template']?></td>
			<td><a href="edit.php?id=<?=$content['id']?>">update</a></td>
			<td><a href="delete.php?id=<?=$content['id']?>">delete</a></td>
		</tr>
			
<?php	}
?>
	</table>
</body>
</html>