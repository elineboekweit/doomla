<?php
require "../db_conn.php";
require "access.php";
CheckAccess();
$id = $db->escape_string($_GET['id']);

$query = "SELECT * FROM pagecontent WHERE id=$id";
$result = $db->query($query);
$result = $result->fetch_assoc();	

$oldsubid = $result['menuoption'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$stmt = $db->prepare("UPDATE pagecontent SET page=?, menuoption=?, menuorder=?, pagecontent_id=?, content=?, template=? WHERE id=?");
	$stmt->bind_param("ssisssi", $page, $menu, $order, $subid, $content, $template, $id);

	$page = isset($_POST['page']) ? strip_tags($_POST['page']) : null;
	$menu = isset($_POST['menu']) ? strip_tags($_POST['menu']) : null;
	$order = isset($_POST['order']) ? strip_tags($_POST['order']) : null;
	$content = isset($_POST['content']) ? $_POST['content'] : null;
	$template= isset($_POST['template']) ? $_POST['template'] : null;
	$subid = isset($_POST['sub']) ? $_POST['sub'] : null;

	$stmt->execute();	
	header("location: index.php");
}

function getPagesForSub($oldsubid, $id) {
	require "../db_conn.php";
	$query = "SELECT * FROM pagecontent WHERE pagecontent_id=0";
	$result = $db->query($query);
	$content = $result->fetch_all(MYSQLI_ASSOC);
	$test = "test";
	echo '<select name="sub">';
	?>
	<option selected disabled style="display:none" value="<?=$id?>"><?=$oldsubid?></option>
	<?php

	foreach ($content as $menu) {
		$id = isset($menu['id']) ? $menu['id'] : null;
		$menuoption = isset($menu['menuoption']) ? $menu['menuoption'] : null;
		if ($menu != null && $menuoption != null){
?>
			<option value="<?=$id?>"><?=$menuoption?></option>
<?php
		}
	}
	echo "</select>";
}
