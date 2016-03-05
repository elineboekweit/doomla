<?php
require "edit.logic.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Pagina wijzigen</h1>
<form method="post">
	<label for="pagina">Pagina:</label>
	<input type="text" id="page" name="page" value="<?=$result['page']?>">
	<br>
	<label for="menu">Menu-optie:</label>
	<input type="text" id="menu" name="menu" value="<?=$result['menuoption']?>">
	<br>
	<label for="order">Menu-order:</label>
	<input type="number" id="order" name="order" value="<?=$result['menuorder']?>">
	<br>
	<label for="template">Template:</label>
	<input type="text" id="template" name="template" value="<?=$result['template']?>">
	<br>
	<label for="inhoud">Inhoud:</label>
	<textarea id="content" name="content"><?=$result['content']?></textarea>
	<br>
	<input type="submit" value="Opslaan">
	<a href="index.php">Annuleren</a>
</form>

</body>
</html>