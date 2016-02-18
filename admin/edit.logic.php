<?php
require "../db_conn.php";

$id = $db->escape_string($_GET['id']);

$query = "SELECT * FROM pagecontent WHERE id=$id";
$result = $db->query($query);
$result = $result->fetch_assoc();	

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$stmt = $db->prepare("UPDATE pagecontent SET page=?, menuoption=?, menuorder=?, content=? WHERE id=?");
	$stmt->bind_param("ssisi", $page, $menu, $order, $content, $id);

	$page = isset($_POST['page']) ? strip_tags($_POST['page']) : null;
	$menu = isset($_POST['menu']) ? strip_tags($_POST['menu']) : null;
	$order = isset($_POST['order']) ? strip_tags($_POST['order']) : null;
	$content = isset($_POST['content']) ? $_POST['content'] : null;
	$stmt->execute();	
	header("location: admin.php");
}

