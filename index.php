<?php 
require 'db_conn.php';

$query = "SELECT * FROM pagecontent";
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
	foreach ($content as $menuoption) {
		$menu = $menuoption['menuoption'];
		$page = $menuoption['page'];
?>
		<ul>
			<li><a href="?page=<?=$page?>"><?=$menu?></a><br></li>
		</ul>
<?php
	}
}



require "templates/template.php";
