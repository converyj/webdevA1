<?php
session_start();
//receive username and passowrd -AND ?
if(isset($_POST['firstName'])) {
	$firstName = $_POST['firstName'];
} else {
	header("Location: register-form.html");
}
if(isset($_POST['lastName'])) {
	$lastName = $_POST['lastName'];
} else {
	header("Location: registration-form.html");
}
if(isset($_POST['email'])) {
	$email = $_POST['email'];
} else {
	header("Location: registration-form.html");
}
if(isset($_POST['username'])) {
	$username = $_POST['username'];
} else {
	header("Location: registration-form.html");
}
if(isset($_POST['password'])) {
	$password = $_POST['password'];
} else {
	header("Location: registration-form.html");
}

echo($firstName);
echo($lastName);
echo($email); 
echo($username);
echo($password); 
$dsn = "mysql:host=localhost;dbname=immnewsnetwork.com;charset=utf8mb4";
$dbusername = "converyj";
$dbpassword = "HUgT86Fga#97";

$pdo = new PDO($dsn, $dbusername, $dbpassword); 
// check if user exists if not add them to the user table

$stmt = $pdo->prepare("
				INSERT INTO `user` 
				(`firstName`, `lastName`, `email`, `username`, `password`)
				VALUES ('$firstName', '$lastName', '$email', '$username', '$password'); ");
$stmt->execute();

$stmt = $pdo->prepare("
				SELECT * FROM `user`
				WHERE `username` = '$username' ");
$stmt->execute();

if ($row = $stmt->fetch()) {
	//start session if valid and redirect to dashboard
	$_SESSION['logged-in'] = true;
	$_SESSION['username'] = $row['username'];
	$_SESSION['role'] = $row['role'];
	$_SESSION['userID'] = $row['userID'];

header("Location: home.php");
}
?>