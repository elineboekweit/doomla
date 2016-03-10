<?php
require "access.php";
require "../db_conn.php";
CheckAccess();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$stmt = $db->prepare("INSERT INTO pagecontent (page, menuoption, menuorder, pagecontent_id, content, template) VALUES (?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("ssssss", $page, $menu, $order, $subid, $content, $template);

	$page = isset($_POST['page']) ? strip_tags($_POST['page']) : null;
	$menu = isset($_POST['menu']) ? strip_tags($_POST['menu']) : null;
	$order = isset($_POST['order']) ? strip_tags($_POST['order']) : null;
	$sub = isset($_POST['sub']) ? $_POST['sub'] : null;
	$content = isset($_POST['content']) ? $_POST['content'] : null;
	$template = isset($_POST['template']) ? $_POST['template'] : null;
	$subid = isset($_POST['sub']) ? $_POST['sub'] : null;
	
	$stmt->execute();
	header("location: index.php");
}

function getPagesForSub() {
	require "../db_conn.php";
	$query = "SELECT * FROM pagecontent WHERE pagecontent_id = 0";
	$result = $db->query($query);
	$content = $result->fetch_all(MYSQLI_ASSOC);
	echo '<select name="sub">';
	echo '<option selected value="0">none</option>';
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