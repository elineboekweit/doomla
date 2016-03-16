<?php
function setAccess($username) {
	require "../db_conn.php";
	
	require "../db_conn.php";
	$stmt = $db->prepare("UPDATE user SET token=?, expiry=? WHERE name=?");
	$stmt->bind_param("sis", $token, $expiry, $username);

	$token = rand(1, 9999999);
	$expiry = time() +600;

	setcookie("token", $token, $expiry);
	setcookie ("username", $username, $expiry);

	$stmt->execute();

}


function getAccessUsername() {
	require "../db_conn.php";
	$usercookie = isset($_COOKIE['username']) ? $_COOKIE['username'] : header ("location: login.php?usercookie");
	$tokencookie = isset($_COOKIE['token']) ? $_COOKIE['token'] : header ("location: login.php?tokencookie");
	$now = time();


	$query = "SELECT * FROM user WHERE name='$usercookie'";
	$result = $db->query($query);
	$fetch = $result->fetch_assoc();
	return $fetch['name'];

}

function checkAccess() {
	$username = getAccessUsername();

	if ($username != '') {
		setAccess($username);
	}else{
		header ("location: login.php?usercookie");
	}
}