<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	if (isset($_GET['id'])) {
		require "../db_conn.php";

		$id = $db-> escape_string($_GET['id']);

		$query = "SELECT * FROM pagecontent where id=$id";
		$result = $db->query($query);
		$result = $result->fetch_assoc();

		$page = $result['page'];
		$menu = $result['menuoption'];
		$order = $result['menuorder'];
		$content = $result['content'];
	}else{
		header("location: admin.php");
	}
}elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['confirmed'])){
		require "../db_conn.php";

		$id = $db->escape_string($_POST['id']);

		$query = "DELETE FROM pagecontent WHERE id=$id";
		$result = $db->query($query);
	}
	header("location: admin.php");
}