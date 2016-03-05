<!DOCTYPE html>
<html>
<head>
	<title><?php echo getTitle($content);?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="templates/css/style.css">
</head>
<body>
	<header>
		<nav>
			<?php echo getMenu($content);?>
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
