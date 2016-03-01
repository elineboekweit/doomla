<?php 
require 'db_conn.php';

$query = "SELECT * FROM pagecontent ORDER BY menuorder";
$result = $db->query($query);
$content = $result->fetch_all(MYSQLI_ASSOC);
$template = "template.php";

function getContent($content) {
	$once = false;
	$page = isset($_GET['page']) ? $_GET['page'] : 'home';
	foreach ($content as $contentpart ) {
		if ($contentpart['page'] == $page) {
			$content1 = $contentpart['content'];
			$template = $contentpart['template'];
			$template = isset($contentpart['template']) ? $contentpart['template'] : null;
			if ($template == null) {
				$template = "template";
			}
			return array('content1' => $content1, 'template' => $template);
		}else {
			$once = true;
		}
	}
	if ($once) {
		echo "page does not exsist.";
	}
}


function getMenu($content) {
	echo "<ul>";
	foreach ($content as $menuoption) {
		$menu = $menuoption['menuoption'];
		$page = $menuoption['page'];
		$getpage = $_GET['page']; 
		$active = ($page == $getpage) ? 'active' : 'inactive';
		//<li class="<?= $active = ($page == $menuitem['page']) ? 'active' : 'inactive' ;
?>
			<li class="<?=$active?>"><a href="?page=<?=$page?>"><?=$menu?></a></li>
<?php
	}

	echo "<ul>";
}
$template = getContent($content)['template'];
require "templates/$template.php";
