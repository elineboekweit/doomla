<!DOCTYPE html>
<html>
<head>
	<title>doomla</title>
	<link rel="stylesheet" href="templates/template.php">
</head>
<body>
	<nav>
		<?php echo getMenu($content);?>
	</nav>
	<section>
		<article>
			<?php echo getContent($content); ?>
		</article>
	</section>

</body>
</html>