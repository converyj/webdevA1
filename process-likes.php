+<?php
session_start();
//get id 
$id = $_GET['id'];
$userID = $_SESSION['userID'];
echo($id); 

echo("You liked " . $id);

//check admin table for valid username and password
$dsn = "mysql:host=localhost;dbname=immnewsnetwork.com;charset=utf8mb4";
$dbusername = "converyj";
$dbpassword = "HUgT86Fga#97";

$pdo = new PDO($dsn, $dbusername, $dbpassword); 
// check if user exists if not add them to the user table
$stmt = $pdo->prepare("
	INSERT INTO `articlelikes`
	VALUES ('$id', '$userID', '1'); ");

$stmt->execute();


?>