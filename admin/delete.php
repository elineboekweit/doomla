<?php
require "delete.logic.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Pagina verwijderen</h1>
<h2>Weet u zeker dat u de pagina wilt verwijderen?</h2>
<form method="post">

	<input type="hidden" name="id" value="<?=$id?>">
	<label for="page">Page:</label>
	<span><?=$page?></span>
	<br>
	<label for="menuoption">Menu-option:</label>
	<span><?=$menu?></span>
	<br>
	<label for="menuorder">menu-order:</label>
	<span><?=$order?></span>
	<br>
	<label for="content">Content:</label>
	<span><?=$content?></span>
	<br>
	<input type="submit" name="confirmed" value="Ja">
	<input type="submit" name="canceled" value="Nee"> 
</form>

</body>
</html>