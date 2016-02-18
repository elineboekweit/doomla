<?php
require "create.logic.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Pagina toevoegen</h1>
	<form method="post">
		<label for="pagina">Pagina:</label>
		<input type="text" id="page" name="page">
		<br>
		<label for="menu">Menu-optie:</label>
		<input type="text" id="menu" name="menu">
		<br>
		<label for="order">Menu-order:</label>
		<input type="number" id="order" name="order" value="0">
		<br>
		<label for="inhoud">Inhoud:</label>
		<textarea id="content" name="content"></textarea>
		<br>
		<input type="submit" value="Opslaan">
		<a href="admin.php">Annuleren</a>
	</form>
</body>
</html>