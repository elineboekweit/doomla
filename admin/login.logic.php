<?php
require "access.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	require "../db_conn.php";

	$username = isset($_POST['username']) ? $_POST['username'] : header("location: login.php?nousername");
	$password = isset($_POST['password']) ? $_POST['password'] : header("location: login.php?nopassword");

	$stmt = $db->prepare("SELECT name FROM user where name=? AND password=?");
	$stmt->bind_param('ss', $username, $password);
	$stmt->execute();
	$stmt->store_result();	
	if ($stmt->num_rows() > 0) {
		setAccess($username);
		header("location: index.php");

	}else {
		header("location: login.php?nocred");
	}

}

