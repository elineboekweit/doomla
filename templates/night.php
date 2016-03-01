<!DOCTYPE html>
<html>
<head>
	<title>doomla</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="templates/css/night.css">
</head>
<body>
	<header>
		<nav>
			<?php echo getMenu($content);?>
		</nav>
	</header>
	<section id="section">
		<h2>Op safari met Doomla in the dark</h2>
	</section>
	<section>
		<article>
			<?php echo getContent($content)['content1']; ?>
		</article>
	</section>
	<footer>
		© 2016 Eline Boekweit
	</footer>
</body>
</html>
