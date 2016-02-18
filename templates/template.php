<!DOCTYPE html>
<html>
<head>
	<title>doomla</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="templates/css/style.css">
</head>
<body>
	<header>
		
	</header>
	<nav>
		<?php echo getMenu($content);?>
	</nav>
	<section id="section">
		<img src="templates/images/lorem.jpg" alt="">
	</section>
	<section>
		<article>
			<?php echo getContent($content); ?>
		</article>
	</section>
	<footer>
		© 2016 Eline Boekweit
	</footer>
</body>
</html>