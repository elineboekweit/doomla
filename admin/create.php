<?php
require "create.logic.php";
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
			<h1 id="title" class="hidden">Pagina toevoegen</h1>
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Gegevens</h2>
			</div>
	<form method="post">
		<label for="pagina">Pagina:</label>
		<br>
		<input type="text" id="page" name="page" style="text-transform: lowercase" maxlength="10" required>
		<br>
		<label for="menu">Menu-optie:</label>
		<br>
		<input type="text" id="menu" name="menu" placeholder="Dezelfde naam als pagina" maxlength="10" required>
		<br>
		<label for="order">Volgorde:</label>
		<br>
		<input type="number" id="order" name="order" value="0">
		<br>
		<label for="sub">Onder:</label>
		<br>
		<?php echo getPagesForSub();?>
		<br>
		<label for="template">template:</label>
		<br>
		<select name="template">
			<option value="">None</option>
			<option value="night">Night</option>
			<option value="books">Books</option>
		</select>
		<br>
		<label for="inhoud">Inhoud:</label>
		<br>
		<textarea id="content" name="content"></textarea>
		<br>
		<input type="submit" value="Opslaan">
		<a href="index.php">Annuleren</a>
	</form>
		</div>
	</div>
</body>

</html>