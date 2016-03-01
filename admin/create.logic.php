<?php
require "../db_conn.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$stmt = $db->prepare("INSERT INTO pagecontent (page, menuoption, menuorder, content, template) VALUES (?, ?, ?, ?, ?)");
	$stmt->bind_param("sssss", $page, $menu, $order, $content, $template);

	$page = isset($_POST['page']) ? strip_tags($_POST['page']) : null;
	$menu = isset($_POST['menu']) ? strip_tags($_POST['menu']) : null;
	$order = isset($_POST['order']) ? strip_tags($_POST['order']) : null;
	$content = isset($_POST['content']) ? $_POST['content'] : null;
	$template = isset($_POST['template']) ? $_POST['template'] : null;
	$stmt->execute();
	header("location: admin.php");
}

