<?php 
require 'db_conn.php';

$query = "SELECT * FROM pagecontent ORDER BY menuorder";
$result = $db->query($query);
$content = $result->fetch_all(MYSQLI_ASSOC);
$template = "template";
$page = isset($_GET['page']) ? $_GET['page'] : 'home';


$pagecontent = isset($content[0]['content']) ? $content[0]['content'] : 'No Content was found';
	
function getContent($content) {
	$once = false;
	global $page;
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

function getMenu() {
	echo "<ul>";
	require 'db_conn.php';
		$query = "SELECT * FROM pagecontent WHERE pagecontent_id=0";
		$result = $db->query($query);
		$content = $result->fetch_all(MYSQLI_ASSOC);

	foreach ($content as $menuoption) {
		$menu = isset($menuoption['menuoption']) ? $menuoption['menuoption'] : null;
		$page = $menuoption['page'];
		$getpage = isset($_GET['page']) ? $_GET['page'] : 'home'; 
		$active = ($page == $getpage) ? 'active' : 'inactive';
		
		if ($menu != null){
?>
			<li class="<?=$active?>"><a href="?page=<?=$page?>"><button><?=$menu?></button></a><?php echo getSubmenu($menuoption['id']) ?></li>
<?php
		}

	}

	echo '<a id="login" href="admin/login.php">login</a></ul>';
}
function getSubmenu($id) {

	require 'db_conn.php';
	$query = "SELECT * FROM pagecontent WHERE pagecontent_id='$id'";
	$result = $db->query($query);
	$submenu = $result->fetch_all(MYSQLI_ASSOC);?>
<?php
	foreach ($submenu as $submenu) {?>
		<li class="submenu"><a href="?page=<?=$submenu['page']?>"><?=$submenu['menuoption']?></a></li>
<?php


?>
<?php
	} 
?>
<?php
}


function getTitle($content){
$getpage = isset($_GET['page']) ? $_GET['page'] : 'home';
	foreach ($content as $page) {
		if ($getpage == $page['page']) {
			$menuoption = $page['menuoption'];
			return $menuoption;
		}	
	}
}

function getModule() {
	require "db_conn.php";
	$query = "SELECT * FROM pagecontent WHERE page='contact'";
	$result = $db->query($query);
	$content = $result->fetch_assoc();
	return $content['content'];

}


$query = "SELECT template FROM pagecontent WHERE page='$page'";
$result = $db->query($query);
$pagecontent = $result->fetch_assoc();

if ($pagecontent['template'] == '') {
	$pagecontent['template'] = 'template';
}

require "templates/".$pagecontent['template'].".php";
