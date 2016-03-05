<?php
require "../db_conn.php";
$username = isset($_COOKIE['username']) ? $_COOKIE['username'] : header("location: ../index.php");

var_dump($username);

$stmt = $db->prepare("UPDATE user SET token=0, expiry=0 WHERE name=?");
$stmt->bind_param("s", $username);
$stmt->execute();

setcookie("token", "logout",time()-1);
setcookie("username", "logout" ,time()-1);
header("location: ../index.php");