<?php
require "delete.logic.php";
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
			<h1 id="title" class="hidden">Pagina verwijderen</h1>
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Weet u zeker dat u de pagina wilt verwijderen?</h2>
			</div>
			<form method="post" id="delete">
				<input type="hidden" name="id" value="<?=$id?>">
				<label for="page">Page:</label>
				<br>
				<span><?=$page?></span>
				<br>
				<label for="menuoption">Menu-option:</label>
				<br>
				<span><?=$menu?></span>
				<br>
				<label for="menuorder">menu-order:</label>
				<br>
				<span><?=$order?></span>
				<br>
				<label for="template">Template:</label>
				<br>
				<span><?=$template?></span>
				<br>
				<label for="content">Content:</label>
				<br>
				<span><?=$content?></span>
				<br>
				<input type="submit" name="confirmed" value="Ja">
				<input type="submit" name="canceled" value="Nee"> 
			</form>
		</div>
	</div>
</body>

</html>


