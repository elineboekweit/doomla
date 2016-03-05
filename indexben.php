<?php
	$page = isset($_GET['page']) ? $_GET['page'] : 'home';

	require "databaselink.php";
	$query = "SELECT * FROM pagecontent WHERE page = '$page'";
	$result = $link->query($query);
	$pagecontent = $result->fetch_all(MYSQLI_ASSOC);

	$content = isset($pagecontent[0]['content']) ? $pagecontent[0]['content'] : 'No Content was found';

	function getContent() {
		global $content;
		return $content;
	}

	function getSubmenu($id){
		global $link;
		$query = "SELECT * FROM pagecontent WHERE pagecontent_id=$id";
		$result = $link->query($query);
		$submenu = $result->fetch_all(MYSQLI_ASSOC);?>
<ul class="submenu">
		<?php foreach ($submenu as $subitem){ ?>
	<li><a href="?page=<?= $subitem['page'] ?>"><?= $subitem['menuoption'] ?></a></li>
		<?php } ?>
</ul>
	<?php }

	$query = "SELECT * FROM pagecontent WHERE pagecontent_id=0 AND page!='contact'ORDER BY menuorder";
	$result = $link->query($query);
	$menucontent = $result->fetch_all(MYSQLI_ASSOC);

	function getMenu() { 
		global $page;
		global $menucontent;
	?>
<ul class="menu">
		<?php foreach ($menucontent as $menuitem) { ?>
	<li class="<?= $active = ($page == $menuitem['page']) ? 'active' : 'inactive' ;?> <?= $menuitem['page'] ?>"><a href="?page=<?= $menuitem['page']?>"><?= $menuitem['menuoption'] ?></a><?= getSubmenu($menuitem['id']) ?></li>	
		<?php } ?>
</ul>
<?php
	}

	$query = "SELECT menuoption FROM pagecontent WHERE page='$page'";
	$result = $link->query($query);
	$title = $result->fetch_all(MYSQLI_ASSOC);

	function getTitle() {
		global $title;
		return $title[0]['menuoption'];
	}

	function getModule($contact){
		global $link;
		$query = "SELECT * FROM pagecontent WHERE page='$contact'";
		$result = $link->query($query);
		$fetch = $result->fetch_assoc();

		$content = isset($fetch['content']) ? $fetch['content'] : '';
		echo $content;		
	}

	require "templates/".$pagecontent[0]['template'].".php";
?>