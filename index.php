<?php 
require 'db_conn.php';

$query = "SELECT * FROM pagecontent ORDER BY menuorder";
$result = $db->query($query);
$content = $result->fetch_all(MYSQLI_ASSOC);

function getContent($content) {
	$once = false;
	$page = isset($_GET['page']) ? $_GET['page'] : 'home';
	foreach ($content as $contentpart ) {
		if ($contentpart['page'] == $page) {
			$content1 = $contentpart['content'];
			return $content1;	
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
?>
			<li><a href="?page=<?=$page?>"><?=$menu?></a></li>
<?php
	}
	echo "<ul>";
}

require "templates/template.php";
