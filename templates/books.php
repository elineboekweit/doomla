<!DOCTYPE html>
<html>
<head>
	<title><?php echo getTitle($content);?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="templates/css/books.css">
	<link rel="icon" href="templates/images/eb.png">
</head>
<body>
	<header>
		<nav>
			<?php echo getMenu();?>
		</nav>
	</header>
	<aside>
		<?php echo getModule();?>
	</aside>
	<section id="section">
		<h2>Op safari met Doomla</h2>
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