<?php
session_start();
//receive username and passowrd
$username = $_POST['username'];
$password = $_POST['password'];

//check admin table for valid username and password
$dsn = "mysql:host=localhost;dbname=immnewsnetwork.com;charset=utf8mb4";
$dbusername = "converyj";
$dbpassword = "HUgT86Fga#97";

$pdo = new PDO($dsn, $dbusername, $dbpassword); 
// check if user exists if not add them to the user table
$stmt = $pdo->prepare("
	SELECT * FROM `user` 
	WHERE `username` = '$username' 
	AND `password` = '$password'");

$stmt->execute();

if($row = $stmt->fetch()){
	//start session if valid and redirect to dashboard
	$_SESSION['logged-in'] = true;
	$_SESSION['username'] = $row['username'];
	$_SESSION['role'] = $row['role'];
	$_SESSION['userID'] = $row['userID'];

	header("Location: home.php");

}else{
	echo("User not found");

$stmt->execute();
}
?>